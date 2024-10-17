<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contract::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory(),
            'state' => $this->faker->randomElement(['new', 'active', 'inactive', 'suspended', 'terminated']),
            'total' => $this->faker->randomFloat(2, 0, 1000),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-5 month', 'now'),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Contract $contract) {
            $contract->services()->attach(Service::factory()->create()->id, ['price' => $this->faker->randomFloat(2, 100, 1000)]);
            $contract->services()->attach(Service::factory()->create()->id, ['price' => $this->faker->randomFloat(2, 100, 1000)]);
        });
    }
}
