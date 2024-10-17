<?php

namespace Database\Factories;

use App\Dto\InvoiceConfig;
use App\Models\Contract;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'invoiceable_type' => $this->faker->randomElement(['order', 'contract']),
            'invoiceable_id' => $this->faker->randomElement([Order::factory(), Contract::factory()]),
            'state' => $this->faker->randomElement(['new', 'pending', 'paid', 'canceled']),
            'due_date' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'quantity' => $this->faker->randomNumber(),
            'total' => $this->faker->randomFloat(2, 0, 1000),
            'config' => (new InvoiceConfig),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-5 month', 'now'),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Invoice $invoice) {
            Payment::factory($this->faker->numberBetween(0, 4))->create([
                'invoice_id' => $invoice->id,
            ]);
        });
    }
}
