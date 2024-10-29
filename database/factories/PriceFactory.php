<?php

namespace Database\Factories;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Price::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'stripe_id' => $this->faker->word(),
            'stripe_product' => $this->faker->word(),
            'active' => $this->faker->boolean(),
            'currency' => $this->faker->randomElement(['USD', 'AED', 'AFN', 'ALL', 'AMD', 'ANG', 'AOA', 'ARS', 'AUD', 'AWG', 'AZN', 'BAM', 'BBD', 'BDT', 'BGN', 'BIF', 'BMD', 'BND', 'BOB', 'BRL', 'BSD', 'BWP', 'BYN', 'BZD', 'CAD', 'CDF', 'CHF', 'CLP', 'CNY', 'COP', 'CRC', 'CVE', 'CZK', 'DJF', 'DKK', 'DOP', 'DZD', 'EGP', 'ETB', 'EUR', 'FJD', 'FKP', 'GBP', 'GEL', 'GIP', 'GMD', 'GNF', 'GTQ', 'GYD', 'HKD', 'HNL', 'HTG', 'HUF', 'IDR', 'ILS', 'INR', 'ISK', 'JMD', 'JPY', 'KES', 'KGS', 'KHR', 'KMF', 'KRW', 'KYD', 'KZT', 'LAK', 'LBP', 'LKR', 'LRD', 'LSL', 'MAD', 'MDL', 'MGA', 'MKD', 'MMK', 'MNT', 'MOP', 'MUR', 'MVR', 'MWK', 'MXN', 'MYR', 'MZN', 'NAD', 'NGN', 'NIO', 'NOK', 'NPR', 'NZD', 'PAB', 'PEN', 'PGK', 'PHP', 'PKR', 'PLN', 'PYG', 'QAR', 'RON', 'RSD', 'RUB', 'RWF', 'SAR', 'SBD', 'SCR', 'SEK', 'SGD', 'SHP', 'SLE', 'SOS', 'SRD', 'STD', 'SZL', 'THB', 'TJS', 'TOP', 'TRY', 'TTD', 'TWD', 'TZS', 'UAH', 'UGX', 'UYU', 'UZS', 'VND', 'VUV', 'WST', 'XAF', 'XCD', 'XOF', 'XPF', 'YER', 'ZAR', 'ZMW']),
            'metadata' => '{}',
            'nickname' => $this->faker->word(),
            'recurring' => '{}',
            'type' => $this->faker->randomElement(['one_time', 'recurring']),
            'unit_amount' => $this->faker->numberBetween(-10000, 10000),
            'unit_label' => $this->faker->word(),
            'billing_scheme' => $this->faker->randomElement(['per_unit', 'tiered']),
            'created' => $this->faker->randomNumber(4),
            'currency_options' => '{}',
            'custom_unit_amount' => '{}',
            'livemode' => $this->faker->boolean(),
            'lookup_key' => $this->faker->word(),
            'tax_behavior' => $this->faker->randomElement(['exclusive', 'inclusive', 'unspecified']),
            'tiers' => '{}',
            'tiers_mode' => $this->faker->randomElement(['graduated', 'volume']),
            'transform_quantity' => '{}',
            'unit_amount_decimal' => $this->faker->word(),
        ];
    }
}
