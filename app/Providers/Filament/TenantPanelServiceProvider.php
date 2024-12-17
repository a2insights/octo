<?php

namespace App\Providers\Filament;

use A2Insights\FilamentSaas\Features\Features;
use A2Insights\FilamentSaas\Tenant\Actions\FilamentCompanies\AddCompanyEmployee;
use A2Insights\FilamentSaas\Tenant\Actions\FilamentCompanies\CreateConnectedAccount;
use A2Insights\FilamentSaas\Tenant\Actions\FilamentCompanies\CreateNewUser;
use A2Insights\FilamentSaas\Tenant\Actions\FilamentCompanies\CreateUserFromProvider;
use A2Insights\FilamentSaas\Tenant\Actions\FilamentCompanies\DeleteCompany;
use A2Insights\FilamentSaas\Tenant\Actions\FilamentCompanies\DeleteUser;
use A2Insights\FilamentSaas\Tenant\Actions\FilamentCompanies\HandleInvalidState;
use A2Insights\FilamentSaas\Tenant\Actions\FilamentCompanies\InviteCompanyEmployee;
use A2Insights\FilamentSaas\Tenant\Actions\FilamentCompanies\RemoveCompanyEmployee;
use A2Insights\FilamentSaas\Tenant\Actions\FilamentCompanies\ResolveSocialiteUser;
use A2Insights\FilamentSaas\Tenant\Actions\FilamentCompanies\SetUserPassword;
use A2Insights\FilamentSaas\Tenant\Actions\FilamentCompanies\UpdateCompanyName;
use A2Insights\FilamentSaas\Tenant\Actions\FilamentCompanies\UpdateConnectedAccount;
use A2Insights\FilamentSaas\Tenant\Actions\FilamentCompanies\UpdateUserPassword;
use A2Insights\FilamentSaas\Tenant\Actions\FilamentCompanies\UpdateUserProfileInformation;
use A2Insights\FilamentSaas\Tenant\Http\Middleware\TenancyInitialize;
use A2Insights\FilamentSaas\User\Filament\Components\Phone;
use A2Insights\FilamentSaas\User\Filament\Components\Username;
use A2Insights\FilamentSaas\User\Filament\Pages\TenantRegister;
use A2Insights\FilamentSaas\User\Filament\Pages\TentantUserProfilePage;
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
use Illuminate\Support\Facades\App;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Wallo\FilamentCompanies\Actions\GenerateRedirectForProvider;
use Wallo\FilamentCompanies\Enums\Feature;
use Wallo\FilamentCompanies\Enums\Provider;
use Wallo\FilamentCompanies\FilamentCompanies;
use Wallo\FilamentCompanies\Pages\Auth\Login;
use Wallo\FilamentCompanies\Pages\Company\CompanySettings;
use Wallo\FilamentCompanies\Pages\Company\CreateCompany;

class TenantPanelServiceProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->path(config('filament-saas.tenant_path'))
            ->homeUrl(config('filament-saas.site_path'))
            ->default()
            ->login(Login::class)
            ->registration($this->registrationIsEnabled())
            ->passwordReset()
            ->emailVerification()
            ->profile()
            ->tenant(Company::class)
            ->tenantProfile(CompanySettings::class)
            ->tenantRegistration(CreateCompany::class)
            ->tenantMiddleware([
                TenancyInitialize::class,
            ], isPersistent: true)
            ->sidebarCollapsibleOnDesktop()
            // ->sidebarFullyCollapsibleOnDesktop()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->unsavedChangesAlerts()
            ->pages([
                Pages\Dashboard::class,
            ])
            ->databaseNotifications()
            ->databaseNotificationsPolling('30s')
            ->plugins([
                \Awcodes\FilamentQuickCreate\QuickCreatePlugin::make()
                    ->includes([
                        \A2Insights\FilamentSaas\User\Filament\UserResource::class,
                    ]),
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make(),
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
                \Hasnayeen\Themes\ThemesPlugin::make()->canViewThemesPage(fn () => (bool) auth()?->user()?->hasRole('super_admin')),
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
                \A2Insights\FilamentSaas\User\UserPlugin::make(),
                \A2Insights\FilamentSaas\Features\FeaturesPlugin::make(),
                \A2Insights\FilamentSaas\Settings\SettingsPlugin::make(),
                \A2Insights\FilamentSaas\Tenant\TenantPlugin::make(),
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
                \A2Insights\FilamentSaas\Settings\Http\Middleware\Locale::class,
            ])
            ->authMiddleware([
                Authenticate::class,
                \Cog\Laravel\Ban\Http\Middleware\ForbidBannedUser::class,
            ])
            ->tenantMiddleware([
                \Hasnayeen\Themes\Http\Middleware\SetTheme::class,
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

    // TODO: Not use cached features.
    private function registrationIsEnabled()
    {
        try {
            $features = cache('filament-saas.features') ?? App::make(Features::class);

            return $features->auth_registration ? TenantRegister::class : false;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
