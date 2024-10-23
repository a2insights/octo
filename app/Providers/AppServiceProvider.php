<?php

namespace App\Providers;

use A21ns1g4ts\Billing\Saas;
use App\Models\Company;
use App\Models\User;
use App\Policies\ActivityPolicy;
use BezhanSalleh\FilamentExceptions\Models\Exception;
use BezhanSalleh\PanelSwitch\PanelSwitch;
use Croustibat\FilamentJobsMonitor\Models\QueueMonitor;
use Filament\Events\Auth\Registered;
use HusamTariq\FilamentDatabaseSchedule\Models\Schedule;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Marjose123\FilamentWebhookServer\Models\FilamentWebhookServer;
use SolutionForest\FilamentFirewall\Models\Ip;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Role;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Relation::morphMap([
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Ip::class, \App\Policies\IpPolicy::class);
        Gate::policy(QueueMonitor::class, \App\Policies\QueueMonitorPolicy::class);
        Gate::policy(FilamentWebhookServer::class, \App\Policies\WebhookPolicy::class);
        Gate::policy(Role::class, \App\Policies\RolePolicy::class);
        Gate::policy(User::class, \App\Policies\UserPolicy::class);
        Gate::policy(Schedule::class, \App\Policies\SchedulePolicy::class);
        Gate::policy(Activity::class, ActivityPolicy::class);
        Gate::policy(Exception::class, \App\Policies\ExceptionPolicy::class);

        $freeStripePlan = Saas::plan('Free Plan', 'price_1QBHY2KBVLqcMf8uAIR0OecB')
            ->features([
                Saas::feature('Build Minutes', 'build.minutes', 10),
                Saas::feature('Seats', 'teams', 5)->notResettable(),
            ]);
        $freeStripePlan = Saas::plan('Pro', 'price_1QBHY2KBVLqcMf8uAIR0sOecB')
            ->features([
                Saas::feature('Build Minutes', 'build.minutes', 10),
                Saas::feature('Seats', 'teams', 5)->notResettable(),
            ]);

        // Saas::plan('Monthly $10', static::$billingMonthlyPlanId)
        //     ->inheritFeaturesFromPlan($freeStripePlan, [
        //         Saas::feature('Build Minutes', 'build.minutes', 3000),
        //         Saas::meteredFeature('Metered Build Minutes', 'metered.build.minutes', 3000)
        //             ->meteredPrice(static::$billingMeteredPriceId, 0.1, 'minute'),
        //         Saas::feature('Seats', 'teams', 10)->notResettable(),
        //         Saas::feature('Mails', 'mails', 300),
        //     ]);

        Event::listen(function (Registered $event) {
            $user = $event->getUser();
            $user->assignRole('user');
        });

        PanelSwitch::configureUsing(function (PanelSwitch $panelSwitch) {
            $panelSwitch
                ->simple()
                ->visible(fn (): bool => auth()->user()?->hasAnyRole([
                    'super_admin',
                ]));
        });

        Company::created(function (Company $company) {
            $company->initialize();

            $cachePath = storage_path('framework/cache');

            if (! is_dir($cachePath)) {
                if (! mkdir($cachePath, 0777, true) && ! is_dir($cachePath)) {
                    throw new \RuntimeException(sprintf('Directory "%s" was not created', $cachePath));
                }
            }

            $company->end();
        });
    }
}
