<?php

namespace Database\Factories;

use App\Models\Integration;
use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'invoice_id' => Invoice::factory(),
            'integration_id' => Integration::factory(),
            'total' => $this->faker->randomFloat(2, 0, 1000),
            'state' => $this->faker->randomElement(['new', 'pending', 'paid', 'canceled']),
            'data' => [],
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-5 month', 'now'),
        ];
    }
}
