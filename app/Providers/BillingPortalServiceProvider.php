<?php

namespace App\Providers;

use App\Actions\BillingPortal\HandleSubscriptions;
use Illuminate\Support\ServiceProvider;
use Octo\Billing\BillingPortal;

class BillingPortalServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        // BillingPortal::dontProrateOnSwap();

        BillingPortal::handleSubscriptionsUsing(HandleSubscriptions::class);
    }
}
