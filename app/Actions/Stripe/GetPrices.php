<?php

namespace App\Actions\Stripe;

use Lorisleiva\Actions\Concerns\AsAction;

class GetPrices extends StripeBaseAction
{
    use AsAction;

    public function handle($limit = 100)
    {
        return $this->stripe->prices->all(['limit' => $limit]);
    }
}
