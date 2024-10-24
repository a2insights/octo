<?php

namespace App\Actions\Stripe;

use Lorisleiva\Actions\Concerns\AsAction;

class UpdateCustomer extends StripeBaseAction
{
    use AsAction;

    public function handle(string $stripeId, array $data)
    {
        $data = [
            'address' => $data['address'],
            'description' => $data['description'],
            'email' => $data['email'],
            'metadata' => $data['metadata'],
            'name' => $data['name'],
            'phone' => $data['phone'],
            'shipping' => $data['shipping'],
            'balance' => $data['balance'],
            'cash_balance' => $data['cash_balance'],
            'coupon' => $data['coupon'],
            'default_source' => $data['default_source'],
            'invoice_prefix' => $data['invoice_prefix'],
            'invoice_settings' => $data['invoice_settings'],
            'next_invoice_sequence' => $data['next_invoice_sequence'],
            'preferred_locales' => $data['preferred_locales'],
            'promotion_code' => $data['promotion_code'],
            'source' => $data['source'],
            'tax' => $data['tax'],
            'tax_exempt' => $data['tax_exempt'],
        ];

        foreach ($data as $key => $value) {
            if (is_null($value)) {
                unset($data[$key]);
            }
        }

        return $this->stripe->customers->update($stripeId, $data);
    }
}
