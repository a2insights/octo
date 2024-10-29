<?php

use A21ns1g4ts\FilamentStripe\Actions\Stripe\GetProduct;

test('can get a product', function () {
    GetProduct::mock()
        ->shouldReceive('handle')
        ->with('prod_NWjs8kKbJWmuuc')
        ->andReturn(json_decode('{
            "id": "prod_NWjs8kKbJWmuuc",
            "object": "product",
            "active": true,
            "created": 1678833149,
            "default_price": null,
            "description": null,
            "images": [],
            "marketing_features": [],
            "livemode": false,
            "metadata": {},
            "name": "Gold Plan",
            "package_dimensions": null,
            "shippable": null,
            "statement_descriptor": null,
            "tax_code": null,
            "unit_label": null,
            "updated": 1678833149,
            "url": null
        }'));

    $product = GetProduct::run('prod_NWjs8kKbJWmuuc');
    $this->assertSame('Gold Plan', $product->name);
});
