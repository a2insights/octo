<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'cnpj' => $this->faker->numerify('##############'),
            'address' => [
                'postal_code' => $this->faker->numerify('#####-###'),
                'street' => $this->faker->streetName(),
                'number' => $this->faker->buildingNumber(),
                'complement' => $this->faker->secondaryAddress(),
                'district' => $this->faker->citySuffix(),
                'city' => $this->faker->city(),
                'state' => $this->faker->stateAbbr(),
            ],
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-5 month', 'now'),
        ];
    }
}
