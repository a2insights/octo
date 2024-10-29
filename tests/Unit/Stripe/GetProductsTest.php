<?php

use A21ns1g4ts\FilamentStripe\Actions\Stripe\GetProducts;

test('can list products', function () {
    GetProducts::mock()
        ->shouldReceive('handle')
        ->with(1)
        ->andReturn(json_decode('{
            "object": "list",
            "url": "/v1/products",
            "has_more": false,
            "data": [
              {
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
              }
            ]
         }'));

    $products = GetProducts::run(1);
    $this->assertSame('prod_NWjs8kKbJWmuuc', $products->data[0]->id);
});
