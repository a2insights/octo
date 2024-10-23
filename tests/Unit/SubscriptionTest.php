<?php

use App\Models\Subscription;
use App\Models\Customer;

it('can create a subscription', function () {
    $customer = Customer::factory()->create();

    $subscription = Subscription::create([
        'customer_id' => $customer->id,
        'stripe_id' => 'sub_fake_id',
        'price' => 29.99,
        'status' => 'active',
    ]);

    expect($subscription)->toBeInstanceOf(Subscription::class);
    expect($subscription->status)->toBe('active');
    expect($subscription->customer_id)->toBe($customer->id);
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
