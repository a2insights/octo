<?php

namespace App\Actions\Stripe;

use Lorisleiva\Actions\Concerns\AsAction;

class GetCustomer extends StripeBaseAction
{
    use AsAction;

    public function handle(string $stripeId)
    {
        return $this->stripe->customers->retrieve($stripeId, []);
    }
}
