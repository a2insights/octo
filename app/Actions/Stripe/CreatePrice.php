<?php

namespace App\Actions\Stripe;

use Lorisleiva\Actions\Concerns\AsAction;

class CreatePrice extends StripeBaseAction
{
    use AsAction;

    public function handle(
        string $productId,
        string $currencyCode,
        int $unitAmount,
        array $recurring = ['interval' => 'month'],
        string $billingScheme = 'per_unit',
        array $data = []
    ) {
        $data['product'] = $productId;
        $data['currency'] = $currencyCode;
        $data['unit_amount'] = $unitAmount;
        $data['recurring'] = $recurring;
        $data['billing_scheme'] = $billingScheme;

        return $this->stripe->prices->create($data);
    }
}
