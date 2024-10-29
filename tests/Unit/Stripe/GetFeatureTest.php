<?php

use A21ns1g4ts\FilamentStripe\Actions\Stripe\GetFeature;

test('can get a feature', function () {
    GetFeature::mock()
        ->shouldReceive('handle')
        ->with('feat_test_61QGU1MWyFMSP9YBZ41ClCIKljWvsTgu')
        ->andReturn(json_decode('{
            "id": "feat_test_61QGU1MWyFMSP9YBZ41ClCIKljWvsTgu",
            "object": "entitlements.feature",
            "livemode": false,
            "name": "My super awesome feature",
            "lookup_key": "my-super-awesome-feature",
            "active": true,
            "metadata": {}
        }'));

    $feature = GetFeature::run('feat_test_61QGU1MWyFMSP9YBZ41ClCIKljWvsTgu');
    $this->assertSame('My super awesome feature', $feature->name);
});
