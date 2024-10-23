<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Customer;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'address' => '{}',
            'description' => $this->faker->text(),
            'email' => $this->faker->safeEmail(),
            'metadata' => '{}',
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'shipping' => '{}',
            'created' => $this->faker->dateTime(),
            'cash_balance' => '{}',
            'balance' => $this->faker->numberBetween(-10000, 10000),
            'default_source' => '{}',
            'delinquent' => $this->faker->boolean(),
            'discount' => '{}',
            'invoice_credit_balance' => '{}',
            'invoice_prefix' => $this->faker->word(),
            'invoice_settings' => '{}',
            'livemode' => $this->faker->boolean(),
            'next_invoice_sequence' => $this->faker->numberBetween(1, 10000),
            'preferred_locales' => '{}',
            'sources' => '{}',
            'subscriptions' => '{}',
            'tax_exempt' => $this->faker->randomElement(["exempt","none","reverse"]),
            'tax' => '{}',
            'tax_ids' => '{}',
            'test_clock' => $this->faker->word(),
        ];
    }
}
