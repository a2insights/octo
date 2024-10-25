<?php

namespace App\Actions\Stripe;

use Lorisleiva\Actions\Concerns\AsAction;

class CreateFeature extends StripeBaseAction
{
    use AsAction;

    public function handle(string $name)
    {
        $data['name'] = $name;

        return $this->stripe->entitlements->features->create($data);
    }
}
