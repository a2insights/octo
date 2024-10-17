<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory(),
            'state' => $this->faker->randomElement(['new', 'pending', 'paid', 'canceled']),
            'total' => $this->faker->randomFloat(2, 0, 1000),
            'quantity' => $this->faker->numberBetween(1, 10),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-5 month', 'now'),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Order $order) {
            $order->items()->createMany([
                ['orderable_id' => Service::factory()->create()->id, 'orderable_type' => 'service', 'quantity' => $this->faker->numberBetween(1, 10), 'total' => $this->faker->randomFloat(2, 100, 1000)],
                ['orderable_id' => Service::factory()->create()->id, 'orderable_type' => 'service', 'quantity' => $this->faker->numberBetween(1, 10), 'total' => $this->faker->randomFloat(2, 100, 1000)],
            ]);

            Invoice::factory($this->faker->numberBetween(0, 4))->create([
                'invoiceable_type' => 'order',
                'invoiceable_id' => $order->id,
            ]);
        });
    }
}
