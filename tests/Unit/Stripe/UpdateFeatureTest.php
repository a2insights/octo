<?php

use A21ns1g4ts\FilamentStripe\Actions\Stripe\UpdateFeature;

test('can update a customer', function () {
    UpdateFeature::mock()
        ->shouldReceive('handle')
        ->with('feat_test_61QGU1MWyFMSP9YBZ41ClCIKljWvsTgu', ['name' => 'My super awesome feature'])
        ->andReturn(json_decode('{
            "id": "feat_test_61QGU1MWyFMSP9YBZ41ClCIKljWvsTgu",
            "object": "entitlements.feature",
            "livemode": false,
            "name": "My super awesome feature",
            "lookup_key": "my-super-awesome-feature",
            "active": true,
            "metadata": {
                "order_id": "6735"
            }
          }'));

    $feature = UpdateFeature::run('feat_test_61QGU1MWyFMSP9YBZ41ClCIKljWvsTgu', ['name' => 'My super awesome feature']);
    $this->assertSame('My super awesome feature', $feature->name);
});
