<?php

use A21ns1g4ts\FilamentStripe\Actions\Stripe\UpdatePrice;

test('can update a price', function () {
    UpdatePrice::mock()
        ->shouldReceive('handle')
        ->with('price_1MoBy5LkdIwHu7ixZhnattbh', ['currency' => 'brl'])
        ->andReturn(json_decode('{
            "id": "price_1MoBy5LkdIwHu7ixZhnattbh",
            "object": "price",
            "active": true,
            "billing_scheme": "per_unit",
            "created": 1679431181,
            "currency": "brl",
            "custom_unit_amount": null,
            "livemode": false,
            "lookup_key": null,
            "metadata": {},
            "nickname": null,
            "product": "prod_NZKdYqrwEYx6iK",
            "recurring": {
              "aggregate_usage": null,
              "interval": "month",
              "interval_count": 1,
              "trial_period_days": null,
              "usage_type": "licensed"
            },
            "tax_behavior": "unspecified",
            "tiers_mode": null,
            "transform_quantity": null,
            "type": "recurring",
            "unit_amount": 1000,
            "unit_amount_decimal": "1000"
          }'));

    $price = UpdatePrice::run('price_1MoBy5LkdIwHu7ixZhnattbh', ['currency' => 'brl']);
    $this->assertSame('brl', $price->currency);
});
