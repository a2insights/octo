<?php

use A21ns1g4ts\FilamentStripe\Actions\Stripe\UpdateProduct;

test('can update a product', function () {
    UpdateProduct::mock()
        ->shouldReceive('handle')
        ->with('prod_NWjs8kKbJWmuuc', [
            'name' => 'Gold Plan Updated',
            'description' => null,
        ])
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
            "name": "Gold Plan Updated",
            "package_dimensions": null,
            "shippable": null,
            "statement_descriptor": null,
            "tax_code": null,
            "unit_label": null,
            "updated": 1678833149,
            "url": null
        }'));

    $product = UpdateProduct::run('prod_NWjs8kKbJWmuuc', ['name' => 'Gold Plan Updated', 'description' => null]);
    $this->assertSame('Gold Plan Updated', $product->name);
});
