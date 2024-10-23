<?php

use App\Models\Customer;

it('can create a customer', function () {
    $customer = Customer::create([
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'phone' => '1234567890',
    ]);

    expect($customer)->toBeInstanceOf(Customer::class);
    expect($customer->name)->toBe('John Doe');
    expect($customer->email)->toBe('john.doe@example.com');
    expect($customer->phone)->toBe('1234567890');
});

it('can update a customer', function () {
    $customer = Customer::factory()->create();

    $customer->update(['name' => 'Jane Doe', 'email' => 'jane.doe@example.com']);

    expect($customer->fresh()->name)->toBe('Jane Doe');
    expect($customer->fresh()->email)->toBe('jane.doe@example.com');
});

it('can delete a customer', function () {
    $customer = Customer::factory()->create();

    $customer->delete();

    expect(Customer::find($customer->id))->toBeNull();
});

it('can associate subscriptions with a customer', function () {
    $customer = Customer::factory()->create();
    $order = $customer->subscriptions()->create([
        'state' => 'active',
    ]);

    expect($order->customer_id)->toBe($customer->id);
    expect($customer->subscriptions()->count())->toBe(1);
});
