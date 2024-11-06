<?php

namespace App\Providers;

use A21ns1g4ts\FilamentStripe\Models\Customer;
use A21ns1g4ts\FilamentStripe\Models\Feature;
use A21ns1g4ts\FilamentStripe\Models\Price;
use A21ns1g4ts\FilamentStripe\Models\Product;
use App\Models\Company;
use App\Models\ConnectedAccount;
use App\Models\User;
use BezhanSalleh\FilamentExceptions\Models\Exception;
use Croustibat\FilamentJobsMonitor\Models\QueueMonitor;
use Filament\Events\Auth\Registered;
use Firefly\FilamentBlog\Models\Category;
use Firefly\FilamentBlog\Models\Comment;
use Firefly\FilamentBlog\Models\NewsLetter;
use Firefly\FilamentBlog\Models\Post;
use Firefly\FilamentBlog\Models\SeoDetail;
use Firefly\FilamentBlog\Models\Setting;
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
            'user' => User::class,
            'company' => Company::class,
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Activity::class, \App\Policies\ActivityPolicy::class);
        Gate::policy(Category::class, \App\Policies\CategoryPolicy::class);
        Gate::policy(Comment::class, \App\Policies\CommentPolicy::class);
        Gate::policy(Company::class, \App\Policies\CompanyPolicy::class);
        Gate::policy(ConnectedAccount::class, \App\Policies\ConnectedAccountPolicy::class);
        Gate::policy(Customer::class, \App\Policies\CustomerPolicy::class);
        Gate::policy(Exception::class, \App\Policies\ExceptionPolicy::class);
        Gate::policy(Feature::class, \App\Policies\FeaturePolicy::class);
        Gate::policy(Ip::class, \App\Policies\IpPolicy::class);
        Gate::policy(NewsLetter::class, \App\Policies\NewsletterPolicy::class);
        Gate::policy(Post::class, \App\Policies\PostPolicy::class);
        Gate::policy(Price::class, \App\Policies\PricePolicy::class);
        Gate::policy(Product::class, \App\Policies\ProductPolicy::class);
        Gate::policy(QueueMonitor::class, \App\Policies\QueueMonitorPolicy::class);
        Gate::policy(Role::class, \App\Policies\RolePolicy::class);
        Gate::policy(Schedule::class, \App\Policies\SchedulePolicy::class);
        Gate::policy(SeoDetail::class, \App\Policies\SeoDetailPolicy::class);
        Gate::policy(Setting::class, \App\Policies\SettingPolicy::class);
        Gate::policy(User::class, \App\Policies\UserPolicy::class);
        Gate::policy(FilamentWebhookServer::class, \App\Policies\WebhookPolicy::class);

        Event::listen(function (Registered $event) {
            $user = $event->getUser();
            $user->assignRole('user');
        });
    }
}
