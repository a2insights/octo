<?php

use App\Models\Subscription;
use App\Models\Billable;

it('can create a subscription', function () {
    $billable = Billable::factory()->create();

    $subscription = Subscription::create([
        'billable_id' => $billable->id,
        'stripe_id' => 'sub_fake_id',
        'price' => 29.99,
        'status' => 'active',
    ]);

    expect($subscription)->toBeInstanceOf(Subscription::class);
    expect($subscription->status)->toBe('active');
    expect($subscription->billable_id)->toBe($billable->id);
});

it('can update a subscription', function () {
    $subscription = Subscription::factory()->create();

    $subscription->update(['status' => 'canceled']);

    expect($subscription->fresh()->status)->toBe('canceled');
});

it('can delete a subscription', function () {
    $subscription = Subscription::factory()->create();

    $subscription->delete();

    expect(Subscription::find($subscription->id))->toBeNull();
});
