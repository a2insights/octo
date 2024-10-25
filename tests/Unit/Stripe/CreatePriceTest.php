<?php

use App\Actions\Stripe\CreatePrice;

test('can create a price', function () {
    CreatePrice::mock()
        ->shouldReceive('handle')
        ->with('price_1MoBy5LkdIwHu7ixZhnattbh', 'usd', 1000, ['interval' => 'month'], 'per_unit')
        ->andReturn(json_decode('{
            "id": "price_1MoBy5LkdIwHu7ixZhnattbh",
            "object": "price",
            "active": true,
            "billing_scheme": "per_unit",
            "created": 1679431181,
            "currency": "usd",
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

    $price = CreatePrice::run('price_1MoBy5LkdIwHu7ixZhnattbh', 'usd', 1000, ['interval' => 'month'], 'per_unit');
    $this->assertSame('price_1MoBy5LkdIwHu7ixZhnattbh', $price->id);
});
