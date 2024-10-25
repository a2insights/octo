<?php

namespace App\Actions\Stripe;

use Lorisleiva\Actions\Concerns\AsAction;

class GetCustomers extends StripeBaseAction
{
    use AsAction;

    public function handle($limit = 100)
    {
        return $this->stripe->customers->all(['limit' => $limit]);
    }
}
