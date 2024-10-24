<?php

namespace App\Actions\Stripe;

use Lorisleiva\Actions\Concerns\AsAction;

class UpdateCustomer extends StripeBaseAction
{
    use AsAction;

    public function handle(string $stripeId, array $data)
    {
        return $this->stripe->customers->update($stripeId, $data);
    }
}
