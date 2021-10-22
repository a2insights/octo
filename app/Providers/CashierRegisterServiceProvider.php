<?php

namespace App\Providers;

use RenokiCo\CashierRegister\CashierRegisterServiceProvider as BaseServiceProvider;
use RenokiCo\CashierRegister\Saas;

class CashierRegisterServiceProvider extends BaseServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Saas::currency('BRL');

        Saas::plan('Free Plan', 'price_1JgbF1KBVLqcMf8uOBf7NYAF')
            ->monthly(0)
            ->features([
                Saas::feature('5 Seats', 'seats', 5)->notResettable(),
                Saas::feature('10,000 mails', 'mails', 10000),
            ]);

        Saas::plan('Tier One', 'price_1IriI3KBVLqcMf8ufdEbBfEp')
            ->monthly(5)
            ->features([
                Saas::feature('Unlimited Seats', 'seats')->unlimited()->notResettable(),
                Saas::feature('20,000 mails', 'mails', 20000),
                Saas::feature('Beta Access', 'beta.access')->unlimited(),
            ]);

        Saas::plan('Tier Two', 'price_1Jh22oKBVLqcMf8ufFUi7upc')
            ->monthly(10)
            ->features([
                Saas::feature('Unlimited Seats', 'seats')->unlimited()->notResettable(),
                Saas::feature('30,000 mails', 'mails', 30000),
                Saas::feature('Beta Access', 'beta.access')->unlimited(),
            ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
    }
}
