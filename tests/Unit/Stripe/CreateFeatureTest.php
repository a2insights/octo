<?php

use A21ns1g4ts\FilamentStripe\Actions\Stripe\CreateFeature;

test('can create a feature', function () {
    CreateFeature::mock()
        ->shouldReceive('handle')
        ->with('My super awesome feature')
        ->andReturn(json_decode('{
            "id": "feat_test_61QGU1MWyFMSP9YBZ41ClCIKljWvsTgu",
            "object": "entitlements.feature",
            "livemode": false,
            "name": "My super awesome feature",
            "lookup_key": "my-super-awesome-feature",
            "active": true,
            "metadata": {}
          }'));

    $feature = CreateFeature::run('My super awesome feature');
    $this->assertSame('My super awesome feature', $feature->name);
    $this->assertSame('feat_test_61QGU1MWyFMSP9YBZ41ClCIKljWvsTgu', $feature->id);
});
