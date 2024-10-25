<?php

namespace App\Actions\Stripe;

use Stripe\StripeClient;

abstract class StripeBaseAction
{
    protected StripeClient $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(config('services.stripe.secret'));
    }
}
