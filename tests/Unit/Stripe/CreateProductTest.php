<?php

use App\Actions\Stripe\CreateProduct;

test('can create a product', function () {
    CreateProduct::mock()
        ->shouldReceive('handle')
        ->with('Gold Plan', [
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
            "name": "Gold Plan",
            "package_dimensions": null,
            "shippable": null,
            "statement_descriptor": null,
            "tax_code": null,
            "unit_label": null,
            "updated": 1678833149,
            "url": null
        }'));

    $product = CreateProduct::run('Gold Plan', ['description' => null]);
    $this->assertEquals('Gold Plan', $product->name);
});
