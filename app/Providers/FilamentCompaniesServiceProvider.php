<?php

namespace App\Providers;

use App\Http\Middleware\TenancyInitialize;
use App\Models\Company;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Octo\Tenant\Actions\FilamentCompanies\AddCompanyEmployee;
use Octo\Tenant\Actions\FilamentCompanies\CreateConnectedAccount;
use Octo\Tenant\Actions\FilamentCompanies\CreateNewUser;
use Octo\Tenant\Actions\FilamentCompanies\CreateUserFromProvider;
use Octo\Tenant\Actions\FilamentCompanies\DeleteCompany;
use Octo\Tenant\Actions\FilamentCompanies\DeleteUser;
use Octo\Tenant\Actions\FilamentCompanies\HandleInvalidState;
use Octo\Tenant\Actions\FilamentCompanies\InviteCompanyEmployee;
use Octo\Tenant\Actions\FilamentCompanies\RemoveCompanyEmployee;
use Octo\Tenant\Actions\FilamentCompanies\ResolveSocialiteUser;
use Octo\Tenant\Actions\FilamentCompanies\SetUserPassword;
use Octo\Tenant\Actions\FilamentCompanies\UpdateCompanyName;
use Octo\Tenant\Actions\FilamentCompanies\UpdateConnectedAccount;
use Octo\Tenant\Actions\FilamentCompanies\UpdateUserPassword;
use Octo\Tenant\Actions\FilamentCompanies\UpdateUserProfileInformation;
use Octo\User\Filament\Components\Phone;
use Octo\User\Filament\Components\Username;
use Octo\User\Filament\Pages\TenantRegister;
use Octo\User\Filament\Pages\TentantUserProfilePage;
use Wallo\FilamentCompanies\Actions\GenerateRedirectForProvider;
use Wallo\FilamentCompanies\Enums\Feature;
use Wallo\FilamentCompanies\Enums\Provider;
use Wallo\FilamentCompanies\FilamentCompanies;
use Wallo\FilamentCompanies\Pages\Auth\Login;
use Wallo\FilamentCompanies\Pages\Company\CompanySettings;
use Wallo\FilamentCompanies\Pages\Company\CreateCompany;
use Wallo\FilamentCompanies\Pages\User\Profile;

class FilamentCompaniesServiceProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('company')
            ->path(config('octo.tenant_path'))
            ->homeUrl(static fn (): string => url(Pages\Dashboard::getUrl(panel: 'company', tenant: Auth::user()?->personalCompany())))
            ->default()
            ->login(Login::class)
            ->registration(TenantRegister::class)
            ->passwordReset()
            ->emailVerification()
            ->profile()
            ->tenant(Company::class)
            ->tenantProfile(CompanySettings::class)
            ->tenantRegistration(CreateCompany::class)
            ->tenantMiddleware([
                TenancyInitialize::class,
            ], isPersistent: true)
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->resources([
                config('filament-logger.activity_resource'),
            ])
            ->pages([
                Pages\Dashboard::class,
            ])
            ->databaseNotifications()
            ->databaseNotificationsPolling('30s')
            ->plugins([
                \pxlrbt\FilamentSpotlight\SpotlightPlugin::make(),
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make(),
                \CmsMulti\FilamentClearCache\FilamentClearCachePlugin::make(),
                \Brickx\MaintenanceSwitch\MaintenanceSwitchPlugin::make(),
                \Jeffgreco13\FilamentBreezy\BreezyCore::make()->myProfile(
                    shouldRegisterUserMenu: true, // Sets the 'account' link in the panel User Menu (default = true)
                    shouldRegisterNavigation: false, // Adds a main navigation item for the My Profile page (default = false)
                    hasAvatars: true, // Enables the avatar upload form component (default = false)
                    slug: 'my-profile' // Sets the slug for the profile page (default = 'my-profile')
                )->enableTwoFactorAuthentication(
                    force: false, // force the user to enable 2FA before they can use the application (default = false)
                    // action: CustomTwoFactorPage::class // optionally, use a custom 2FA page
                )
                // TODO: Make configurable
                // ->enableSanctumTokens(
                //     permissions: ['create', 'update', 'view', 'delete'] // optional, customize the permissions (default = ["create", "view", "update", "delete"])
                // )
                    ->customMyProfilePage(TentantUserProfilePage::class)
                    ->myProfileComponents([Phone::class, Username::class])
                    ->avatarUploadComponent(fn ($fileUpload) => $fileUpload
                        ->visibility('private')
                        ->directory('avatars')
                        ->disk('avatars')),
                \Hasnayeen\Themes\ThemesPlugin::make()->canViewThemesPage(fn () => auth()->user() ? auth()->user()?->hasRole('super_admin') : false),
                \Marjose123\FilamentWebhookServer\WebhookPlugin::make(),
                \HusamTariq\FilamentDatabaseSchedule\FilamentDatabaseSchedulePlugin::make(),
                \SolutionForest\FilamentFirewall\FilamentFirewallPanel::make(),
                \pxlrbt\FilamentEnvironmentIndicator\EnvironmentIndicatorPlugin::make(),
                \BezhanSalleh\FilamentExceptions\FilamentExceptionsPlugin::make(),
                \Croustibat\FilamentJobsMonitor\FilamentJobsMonitorPlugin::make()
                    ->label('Job')
                    ->pluralLabel('Jobs')
                    ->enableNavigation(true)
                    ->navigationIcon('heroicon-o-cpu-chip')
                    ->navigationGroup('System')
                    ->navigationSort(5)
                    ->navigationCountBadge(true)
                    ->enablePruning(true)
                    ->pruningRetention(7),
                FilamentCompanies::make()
                    ->userPanel('company')
                    ->switchCurrentCompany()
                    ->updateProfileInformation()
                    ->updatePasswords()
                    ->setPasswords()
                    ->connectedAccounts()
                    ->manageBrowserSessions()
                    ->accountDeletion()
                    ->profilePhotos()
                    ->api()
                    ->companies(invitations: true)
                    ->termsAndPrivacyPolicy()
                    ->notifications()
                    ->modals()
                    ->socialite(
                        providers: [Provider::Google, Provider::Facebook, Provider::Github],
                        features: [
                            Feature::RememberSession,
                            Feature::ProviderAvatars,
                            Feature::RememberSession,
                            Feature::ProviderAvatars,
                            Feature::GenerateMissingEmails,
                            Feature::LoginOnRegistration,
                            Feature::CreateAccountOnFirstLogin,
                        ],
                    ),
                \Octo\User\UserPlugin::make(),
                \Octo\Features\FeaturesPlugin::make(),
                \Octo\Settings\SettingsPlugin::make(),
                \Octo\System\SystemPlugin::make(),
                \Octo\Tenant\TenantPlugin::make(),
            ])
            ->widgets([
                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                \Octo\Settings\Http\Middleware\Locale::class,
            ])
            ->authMiddleware([
                Authenticate::class,
                \Cog\Laravel\Ban\Http\Middleware\ForbidBannedUser::class,
            ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();

        FilamentCompanies::createUsersUsing(CreateNewUser::class);
        FilamentCompanies::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        FilamentCompanies::updateUserPasswordsUsing(UpdateUserPassword::class);

        FilamentCompanies::createCompaniesUsing(CreateCompany::class);
        FilamentCompanies::updateCompanyNamesUsing(UpdateCompanyName::class);
        FilamentCompanies::addCompanyEmployeesUsing(AddCompanyEmployee::class);
        FilamentCompanies::inviteCompanyEmployeesUsing(InviteCompanyEmployee::class);
        FilamentCompanies::removeCompanyEmployeesUsing(RemoveCompanyEmployee::class);
        FilamentCompanies::deleteCompaniesUsing(DeleteCompany::class);
        FilamentCompanies::deleteUsersUsing(DeleteUser::class);

        FilamentCompanies::resolvesSocialiteUsersUsing(ResolveSocialiteUser::class);
        FilamentCompanies::createUsersFromProviderUsing(CreateUserFromProvider::class);
        FilamentCompanies::createConnectedAccountsUsing(CreateConnectedAccount::class);
        FilamentCompanies::updateConnectedAccountsUsing(UpdateConnectedAccount::class);
        FilamentCompanies::setUserPasswordsUsing(SetUserPassword::class);
        FilamentCompanies::handlesInvalidStateUsing(HandleInvalidState::class);
        FilamentCompanies::generatesProvidersRedirectsUsing(GenerateRedirectForProvider::class);
    }

    /**
     * Configure the roles and permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        // FilamentCompanies::defaultApiTokenPermissions(['read']);

        // FilamentCompanies::role('admin', 'Administrator', [
        //     'create',
        //     'read',
        //     'update',
        //     'delete',
        // ])->description('Administrator users can perform any action.');

        // FilamentCompanies::role('editor', 'Editor', [
        //     'read',
        //     'create',
        //     'update',
        // ])->description('Editor users have the ability to read, create, and update.');
    }
}
