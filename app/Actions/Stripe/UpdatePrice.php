<?php

namespace App\Actions\Stripe;

use Lorisleiva\Actions\Concerns\AsAction;

class UpdatePrice extends StripeBaseAction
{
    use AsAction;

    public function handle(string $stripeId, array $data)
    {
        $data = [
            'currency_options' => $data['currency_options'],
            'metadata' => $data['metadata'],
            'active' => $data['active'],
            'nickname' => $data['nickname'],
            'tax_behavior' => $data['tax_behavior'],
            'unit_label' => $data['unit_label'],
            'lookup_key' => $data['lookup_key'],
            'transfer_lookup_key' => $data['transfer_lookup_key'],
        ];

        // Stripe api will ignore keys not in $data
        $data = array_filter($data, fn ($value) => ! is_null($value));

        return $this->stripe->prices->update($stripeId, $data);
    }
}
