<?php

use App\Models\Billable;

it('can create a billable', function () {
    $billable = Billable::create([
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'phone' => '1234567890',
    ]);

    expect($billable)->toBeInstanceOf(Billable::class);
    expect($billable->name)->toBe('John Doe');
    expect($billable->email)->toBe('john.doe@example.com');
    expect($billable->phone)->toBe('1234567890');
});

it('can update a billable', function () {
    $billable = Billable::factory()->create();

    $billable->update(['name' => 'Jane Doe', 'email' => 'jane.doe@example.com']);

    expect($billable->fresh()->name)->toBe('Jane Doe');
    expect($billable->fresh()->email)->toBe('jane.doe@example.com');
});

it('can delete a billable', function () {
    $billable = Billable::factory()->create();

    $billable->delete();

    expect(Billable::find($billable->id))->toBeNull();
});

it('can associate subscriptions with a billable', function () {
    $billable = Billable::factory()->create();
    $order = $billable->subscriptions()->create([
        'state' => 'active',
    ]);

    expect($order->billable_id)->toBe($billable->id);
    expect($billable->subscriptions()->count())->toBe(1);
});
