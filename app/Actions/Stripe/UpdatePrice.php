<?php

namespace App\Actions\Stripe;

use Lorisleiva\Actions\Concerns\AsAction;

class UpdatePrice extends StripeBaseAction
{
    use AsAction;

    public function handle(string $stripeId, array $data)
    {
        $data = [
            'currency' => $data['currency'],
            'unit_amount' => $data['unit_amount'],
            'recurring' => $data['recurring'],
            'billing_scheme' => $data['billing_scheme'],
            'metadata' => $data['metadata'],
            'product' => $data['product'],
            'active' => $data['active'],
            'nickname' => $data['nickname'],
            'tax_behavior' => $data['tax_behavior'],
            'tiers_mode' => $data['tiers_mode'],
            'unit_label' => $data['unit_label'],
            'tiers' => $data['tiers'],
            'tax_rates' => $data['tax_rates'],
            'transfer_data' => $data['transfer_data'],
            'unit_amount_decimal' => $data['unit_amount_decimal'],
        ];

        foreach ($data as $key => $value) {
            if (is_null($value)) {
                unset($data[$key]);
            }
        }

        return $this->stripe->prices->update($stripeId, $data);
    }
}
