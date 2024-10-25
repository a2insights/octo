<?php

namespace App\Actions\Stripe;

use Lorisleiva\Actions\Concerns\AsAction;

class GetProducts extends StripeBaseAction
{
    use AsAction;

    public function handle($limit = 100)
    {
        return $this->stripe->products->all(['limit' => $limit]);
    }
}
