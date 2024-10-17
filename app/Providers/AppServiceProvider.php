<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Contract;
use App\Models\Order;
use App\Models\Service;
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
use SolutionForest\FilamentFieldGroup\Models\FieldGroup;
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
            'service' => Service::class,
            'contract' => Contract::class,
            'order' => Order::class,
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
        Gate::policy(FieldGroup::class, \App\Policies\FieldGroupPolicy::class);

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
