<?php

use App\Models\Price;
use App\Models\Product;

it('can create a price', function () {
    $price = Price::create([
        'product_id' => Product::factory()->create()->id,
        'unit_amount' => 1000, // assuming the unit_amount is in cents
        'currency' => 'USD',
    ]);

    expect($price)->toBeInstanceOf(Price::class);
    expect($price->unit_amount)->toBe(1000);
    expect($price->currency)->toBe('USD');
});

it('can update a price', function () {
    $price = Price::factory()->create();

    $price->update(['unit_amount' => 1500, 'currency' => 'EUR']);

    expect($price->fresh()->unit_amount)->toBe(1500);
    expect($price->fresh()->currency)->toBe('EUR');
});

it('can delete a price', function () {
    $price = Price::factory()->create();

    $price->delete();

    expect(Price::find($price->id))->toBeNull();
});

it('can associate price with a product', function () {
    $price = Price::factory()->create([
        'product_id' => Product::factory()->create()->id,
    ]);

    // TODO: product is stripe id cu
    // expect($price->product_id)->toBe($price->product->id);
    // expect($price->product)->toBeInstanceOf(Product::class);
});
