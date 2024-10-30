<?php

namespace App\Providers;

use A21ns1g4ts\FilamentStripe\Models\Billable;
use A21ns1g4ts\FilamentStripe\Models\Feature;
use A21ns1g4ts\FilamentStripe\Models\Price;
use A21ns1g4ts\FilamentStripe\Models\Product;
use A21ns1g4ts\FilamentStripe\Models\Subscription;
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
use Stripe\Stripe;

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
        Gate::policy(Billable::class, \A21ns1g4ts\FilamentStripe\Policies\BillablePolicy::class);
        Gate::policy(Product::class, \A21ns1g4ts\FilamentStripe\Policies\ProductPolicy::class);
        Gate::policy(Price::class, \A21ns1g4ts\FilamentStripe\Policies\PricePolicy::class);
        Gate::policy(Feature::class, \A21ns1g4ts\FilamentStripe\Policies\FeaturePolicy::class);

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
