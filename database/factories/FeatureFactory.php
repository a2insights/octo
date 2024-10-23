<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Feature;
use App\Models\Price;
use App\Models\Product;

class FeatureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Feature::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'price_id' => Price::factory(),
            'stripe_price' => $this->faker->word(),
            'product_id' => Product::factory(),
            'value' => $this->faker->numberBetween(1, 100000),
            'name' => $this->faker->name(),
            'resetable' => $this->faker->boolean(),
            'unlimited' => $this->faker->boolean(),
            'meteread' => $this->faker->boolean(),
            'unit' => $this->faker->word(),
            'price' => $this->faker->randomFloat(0, 0, 10000),
        ];
    }
}