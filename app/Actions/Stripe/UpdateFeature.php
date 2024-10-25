<?php

namespace App\Actions\Stripe;

use Lorisleiva\Actions\Concerns\AsAction;

class UpdateFeature extends StripeBaseAction
{
    use AsAction;

    public function handle(string $stripeId, array $data)
    {
        $data = [
            'name' => $data['name'],
            'metadata' => $data['metadata'],
            'active' => $data['active'],
        ];

        foreach ($data as $key => $value) {
            if (is_null($value)) {
                unset($data[$key]);
            }
        }

        return $this->stripe->entitlements->features->update($stripeId, $data);
    }
}
