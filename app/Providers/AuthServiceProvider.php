<?php

namespace App\Providers;

use App\Models\User;
use Croustibat\FilamentJobsMonitor\Models\QueueMonitor;
use HusamTariq\FilamentDatabaseSchedule\Models\Schedule;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Marjose123\FilamentWebhookServer\Models\FilamentWebhookServer;
use SolutionForest\FilamentFirewall\Models\Ip;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Ip::class => \App\Policies\IpPolicy::class,
        QueueMonitor::class => \App\Policies\QueueMonitorPolicy::class,
        FilamentWebhookServer::class => \App\Policies\WebhookPolicy::class,
        Role::class => \App\Policies\RolePolicy::class,
        User::class => \App\Policies\UserPolicy::class,
        Schedule::class => \App\Policies\SchedulePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
