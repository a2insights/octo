<?php

namespace App\Providers;

use A21ns1g4ts\FilamentShop\Models\Brand as FilamentShopBrand;
use A21ns1g4ts\FilamentShop\Models\Category as FilamentShopCategory;
use A21ns1g4ts\FilamentShop\Models\Product as FilamentShopProduct;
use A21ns1g4ts\FilamentStripe\Models\Customer;
use A21ns1g4ts\FilamentStripe\Models\Feature;
use A21ns1g4ts\FilamentStripe\Models\Price;
use A21ns1g4ts\FilamentStripe\Models\Product;
use App\Models\Company;
use App\Models\ConnectedAccount;
use App\Models\User;
use AshAllenDesign\ShortURL\Models\ShortURL;
use BezhanSalleh\FilamentExceptions\Models\Exception;
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
            'user' => User::class,
            'company' => Company::class,
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ShortURL::resolveRelationUsing('company', function (ShortURL $shortUrl) {
            return $shortUrl->belongsTo(config('filament-saas.companies.model'), 'company_id');
        });

        FilamentShopCategory::resolveRelationUsing('company', function (FilamentShopCategory $category) {
            return $category->belongsTo(config('filament-saas.companies.model'), 'company_id');
        });

        FilamentShopBrand::resolveRelationUsing('company', function (FilamentShopBrand $brand) {
            return $brand->belongsTo(config('filament-saas.companies.model'), 'company_id');
        });

        FilamentShopProduct::resolveRelationUsing('company', function (FilamentShopProduct $product) {
            return $product->belongsTo(config('filament-saas.companies.model'), 'company_id');
        });

        Company::resolveRelationUsing('categories', function (Company $company) {
            return $company->hasMany(FilamentShopCategory::class, 'company_id');
        });

        Company::resolveRelationUsing('brands', function (Company $company) {
            return $company->hasMany(FilamentShopBrand::class, 'company_id');
        });

        Company::resolveRelationUsing('products', function (Company $company) {
            return $company->hasMany(FilamentShopProduct::class, 'company_id');
        });

        // Filament Activity
        Gate::policy(Activity::class, \App\Policies\ActivityPolicy::class);

        // Filament Company
        Gate::policy(Company::class, \App\Policies\CompanyPolicy::class);
        Gate::policy(ConnectedAccount::class, \App\Policies\ConnectedAccountPolicy::class);

        // Filament Shield
        Gate::policy(Role::class, \App\Policies\RolePolicy::class);

        // Filament Stripe
        Gate::policy(Customer::class, \App\Policies\Stripe\CustomerPolicy::class);
        Gate::policy(Feature::class, \App\Policies\Stripe\FeaturePolicy::class);
        Gate::policy(Price::class, \App\Policies\Stripe\PricePolicy::class);
        Gate::policy(Product::class, \App\Policies\Stripe\ProductPolicy::class);

        // Filament Shop
        Gate::policy(FilamentShopProduct::class, \App\Policies\Shop\ProductPolicy::class);
        Gate::policy(FilamentShopBrand::class, \App\Policies\Shop\BrandPolicy::class);
        Gate::policy(FilamentShopCategory::class, \App\Policies\Shop\CategoryPolicy::class);

        // Filament ShorUrl
        Gate::policy(ShortURL::class, \App\Policies\ShortUrlPolicy::class);

        // Filament Saas
        Gate::policy(User::class, \App\Policies\UserPolicy::class);

        // Filament Database Schedule
        Gate::policy(FilamentWebhookServer::class, \App\Policies\WebhookPolicy::class);

        // Filament Exception
        Gate::policy(Exception::class, \App\Policies\ExceptionPolicy::class);

        // Filament Firewall
        Gate::policy(Ip::class, \App\Policies\IpPolicy::class);

        // Filament Jobs Monitor
        Gate::policy(QueueMonitor::class, \App\Policies\QueueMonitorPolicy::class);

        // Filament Database Schedule
        Gate::policy(Schedule::class, \App\Policies\SchedulePolicy::class);

        Event::listen(function (Registered $event) {
            $user = $event->getUser();
            $user->assignRole('user');
        });
    }
}
