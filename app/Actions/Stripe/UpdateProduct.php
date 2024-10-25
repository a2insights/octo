<?php

namespace App\Actions\Stripe;

use Lorisleiva\Actions\Concerns\AsAction;

class UpdateProduct extends StripeBaseAction
{
    use AsAction;

    public function handle(string $stripeId, array $data)
    {
        return $this->stripe->products->update($stripeId,  [
            'name' => $data['name'],
            'description' => $data['description'],
            'metadata' => $data['metadata'],
            'active' => $data['active'],
            'default_price' => $data['default_price'],
            'images' => $data['images'],
            'marketing_features' => $data['marketing_features'],
            'package_dimensions' => $data['package_dimensions'],
            'shippable' => (bool) $data['shippable'],
            'statement_descriptor' => $data['statement_descriptor'],
            'tax_code' => $data['tax_code'],
            'unit_label' => $data['unit_label'],
            'url' => $data['url'],
        ]);
    }
}
