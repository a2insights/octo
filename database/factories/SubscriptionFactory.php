<?php

namespace Database\Factories;

use App\Models\Billable;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subscription::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'stripe_id' => $this->faker->word(),
            'billable_id' => Billable::factory(),
            'stripe_customer' => $this->faker->word(),
            'stripe_price' => $this->faker->word(),
            'status' => $this->faker->randomElement(['incomplete', 'incomplete_expired', 'trialing', 'active', 'past_due', 'canceled', 'unpaid', 'or paused']),
            'cancel_at_period_end' => $this->faker->boolean(),
            'currency' => $this->faker->randomElement(['USD', 'AED', 'AFN', 'ALL', 'AMD', 'ANG', 'AOA', 'ARS', 'AUD', 'AWG', 'AZN', 'BAM', 'BBD', 'BDT', 'BGN', 'BIF', 'BMD', 'BND', 'BOB', 'BRL', 'BSD', 'BWP', 'BYN', 'BZD', 'CAD', 'CDF', 'CHF', 'CLP', 'CNY', 'COP', 'CRC', 'CVE', 'CZK', 'DJF', 'DKK', 'DOP', 'DZD', 'EGP', 'ETB', 'EUR', 'FJD', 'FKP', 'GBP', 'GEL', 'GIP', 'GMD', 'GNF', 'GTQ', 'GYD', 'HKD', 'HNL', 'HTG', 'HUF', 'IDR', 'ILS', 'INR', 'ISK', 'JMD', 'JPY', 'KES', 'KGS', 'KHR', 'KMF', 'KRW', 'KYD', 'KZT', 'LAK', 'LBP', 'LKR', 'LRD', 'LSL', 'MAD', 'MDL', 'MGA', 'MKD', 'MMK', 'MNT', 'MOP', 'MUR', 'MVR', 'MWK', 'MXN', 'MYR', 'MZN', 'NAD', 'NGN', 'NIO', 'NOK', 'NPR', 'NZD', 'PAB', 'PEN', 'PGK', 'PHP', 'PKR', 'PLN', 'PYG', 'QAR', 'RON', 'RSD', 'RUB', 'RWF', 'SAR', 'SBD', 'SCR', 'SEK', 'SGD', 'SHP', 'SLE', 'SOS', 'SRD', 'STD', 'SZL', 'THB', 'TJS', 'TOP', 'TRY', 'TTD', 'TWD', 'TZS', 'UAH', 'UGX', 'UYU', 'UZS', 'VND', 'VUV', 'WST', 'XAF', 'XCD', 'XOF', 'XPF', 'YER', 'ZAR', 'ZMW']),
            'current_period_end' => $this->faker->dateTime(),
            'current_period_start' => $this->faker->dateTime(),
            'default_payment_method' => $this->faker->word(),
            'description' => $this->faker->text(),
            'items' => '{}',
            'metadata' => '{}',
            'pending_setup_intent' => $this->faker->word(),
            'pending_update' => '{}',
            'payment_behavior' => $this->faker->randomElement(['allow_incomplete', 'default_incomplete', 'error_if_incomplete', 'pending_if_incomplete']),
            'add_invoice_items' => '{}',
            'application_fee_percent' => $this->faker->randomFloat(0, 0, 100),
            'automatic_tax' => '{}',
            'backdate_start_date' => $this->faker->dateTime(),
            'billing_cycle_anchor' => $this->faker->dateTime(),
            'billing_cycle_anchor_config' => '{}',
            'billing_thresholds' => '{}',
            'cancel_at' => $this->faker->dateTime(),
            'collection_method' => $this->faker->randomElement(['charge_automatically', 'send_invoice']),
            'coupon' => $this->faker->word(),
            'days_until_due' => $this->faker->numberBetween(-10000, 10000),
            'default_source' => $this->faker->word(),
            'default_tax_rates' => '{}',
            'discounts' => '{}',
            'invoice_settings' => '{}',
            'off_session' => $this->faker->boolean(),
            'on_behalf_of' => $this->faker->word(),
            'payment_settings' => '{}',
            'pending_invoice_item_interval' => '{}',
            'promotion_code' => $this->faker->word(),
            'proration_behavior' => $this->faker->randomElement(['always_invoice', 'create_prorations', 'none']),
            'transfer_data' => '{}',
            'trial_from_plan' => $this->faker->boolean(),
            'trial_end' => $this->faker->dateTime(),
            'trial_settings' => '{}',
            'trial_start' => $this->faker->dateTime(),
        ];
    }
}
