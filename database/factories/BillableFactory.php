<?php

namespace Database\Factories;

use App\Models\Billable;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Billable::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'address' => [],
            'description' => $this->faker->text(),
            'email' => $this->faker->safeEmail(),
            'metadata' => [],
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'shipping' => [],
            'created' => $this->faker->numberBetween(1, 10000),
            'balance' => $this->faker->numberBetween(-10000, 10000),
            'cash_balance' => [],
            'currency' => null,
            'default_source' => null,
            'delinquent' => $this->faker->boolean(),
            'discount' => [],
            'invoice_prefix' => $this->faker->word(),
            'invoice_settings' => [
                'custom_fields' => null,
                'default_payment_method' => null,
                'footer' => null,
                'rendering_options' => null,
            ],
            'livemode' => $this->faker->boolean(),
            'next_invoice_sequence' => $this->faker->numberBetween(1, 10000),
            'preferred_locales' => [],
            'tax_exempt' => $this->faker->randomElement(['exempt', 'none', 'reverse']),
            'test_clock' => null,
        ];
    }
}
