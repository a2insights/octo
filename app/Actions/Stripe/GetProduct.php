<?php

namespace App\Actions\Stripe;

use Lorisleiva\Actions\Concerns\AsAction;

class GetProduct extends StripeBaseAction
{
    use AsAction;

    public function handle(string $stripeId)
    {
        return $this->stripe->products->retrieve($stripeId, []);
    }
}
