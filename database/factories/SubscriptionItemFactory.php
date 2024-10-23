<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Subscription;
use App\Models\SubscriptionItem;

class SubscriptionItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubscriptionItem::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'stripe_id' => $this->faker->word(),
            'subscription_id' => Subscription::factory(),
            'stripe_subscription' => $this->faker->word(),
            'stripe_product' => $this->faker->word(),
            'stripe_price' => '{}',
            'quantity' => $this->faker->numberBetween(1, 100000),
        ];
    }
}