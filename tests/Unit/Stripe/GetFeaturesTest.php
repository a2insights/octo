<?php

use A21ns1g4ts\FilamentStripe\Actions\Stripe\GetFeatures;

test('can list features', function () {
    GetFeatures::mock()
        ->shouldReceive('handle')
        ->with(1)
        ->andReturn(json_decode('{
            "object": "list",
            "url": "/v1/entitlements/features",
            "has_more": false,
            "data": [
              {
                "id": "feat_test_61QGU1MWyFMSP9YBZ41ClCIKljWvsTgu",
                "object": "entitlements.feature",
                "livemode": false,
                "name": "My super awesome feature",
                "lookup_key": "my-super-awesome-feature",
                "active": true,
                "metadata": {}
              }
            ]
         }'));

    $features = GetFeatures::run(1);
    $this->assertSame('feat_test_61QGU1MWyFMSP9YBZ41ClCIKljWvsTgu', $features->data[0]->id);
});
