<?php

use A21ns1g4ts\FilamentStripe\Actions\Stripe\UpdateCustomer;

test('can update a customer', function () {
    UpdateCustomer::mock()
        ->shouldReceive('handle')
        ->with('cus_NffrFeUfNV2Hib', ['name' => 'Jenny Rosen', 'email' => 'jennyrosen@example.com'])
        ->andReturn(json_decode('{
            "id": "cus_NffrFeUfNV2Hib",
            "object": "customer",
            "address": null,
            "balance": 0,
            "created": 1680893993,
            "currency": null,
            "default_source": null,
            "delinquent": false,
            "description": null,
            "discount": null,
            "email": "jennyrosen@example.com",
            "invoice_prefix": "0759376C",
            "invoice_settings": {
              "custom_fields": null,
              "default_payment_method": null,
              "footer": null,
              "rendering_options": null
            },
            "livemode": false,
            "metadata": {},
            "name": "Jenny Rosen",
            "phone": null,
            "preferred_locales": [],
            "shipping": null,
            "tax_exempt": "none",
            "tax_ids": null
          }'));

    $customer = UpdateCustomer::run('cus_NffrFeUfNV2Hib', ['name' => 'Jenny Rosen', 'email' => 'jennyrosen@example.com']);
    $this->assertSame('Jenny Rosen', $customer->name);
});
