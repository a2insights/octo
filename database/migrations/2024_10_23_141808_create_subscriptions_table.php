<?php

use App\Models\Billable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Billable::class)->constrained()->cascadeOnDelete();
            $table->string('stripe_id')->nullable();
            $table->string('stripe_price')->nullable();
            $table->enum('status', ['incomplete', 'incomplete_expired', 'trialing', 'active', 'past_due', 'canceled', 'unpaid', 'or paused'])->index()->nullable();
            $table->boolean('cancel_at_period_end')->nullable()->default(false);
            $table->enum('currency', ['USD', 'AED', 'AFN', 'ALL', 'AMD', 'ANG', 'AOA', 'ARS', 'AUD', 'AWG', 'AZN', 'BAM', 'BBD', 'BDT', 'BGN', 'BIF', 'BMD', 'BND', 'BOB', 'BRL', 'BSD', 'BWP', 'BYN', 'BZD', 'CAD', 'CDF', 'CHF', 'CLP', 'CNY', 'COP', 'CRC', 'CVE', 'CZK', 'DJF', 'DKK', 'DOP', 'DZD', 'EGP', 'ETB', 'EUR', 'FJD', 'FKP', 'GBP', 'GEL', 'GIP', 'GMD', 'GNF', 'GTQ', 'GYD', 'HKD', 'HNL', 'HTG', 'HUF', 'IDR', 'ILS', 'INR', 'ISK', 'JMD', 'JPY', 'KES', 'KGS', 'KHR', 'KMF', 'KRW', 'KYD', 'KZT', 'LAK', 'LBP', 'LKR', 'LRD', 'LSL', 'MAD', 'MDL', 'MGA', 'MKD', 'MMK', 'MNT', 'MOP', 'MUR', 'MVR', 'MWK', 'MXN', 'MYR', 'MZN', 'NAD', 'NGN', 'NIO', 'NOK', 'NPR', 'NZD', 'PAB', 'PEN', 'PGK', 'PHP', 'PKR', 'PLN', 'PYG', 'QAR', 'RON', 'RSD', 'RUB', 'RWF', 'SAR', 'SBD', 'SCR', 'SEK', 'SGD', 'SHP', 'SLE', 'SOS', 'SRD', 'STD', 'SZL', 'THB', 'TJS', 'TOP', 'TRY', 'TTD', 'TWD', 'TZS', 'UAH', 'UGX', 'UYU', 'UZS', 'VND', 'VUV', 'WST', 'XAF', 'XCD', 'XOF', 'XPF', 'YER', 'ZAR', 'ZMW'])->nullable();
            $table->timestamp('current_period_end')->nullable();
            $table->timestamp('current_period_start')->nullable();
            $table->string('default_payment_method')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('description')->nullable();
            $table->json('metadata')->nullable();
            $table->string('pending_setup_intent')->nullable();
            $table->json('pending_update')->nullable();
            $table->enum('payment_behavior', ['allow_incomplete', 'default_incomplete', 'error_if_incomplete', 'pending_if_incomplete'])->nullable();
            $table->json('add_invoice_items')->nullable();
            $table->decimal('application_fee_percent')->nullable();
            $table->json('automatic_tax')->nullable();
            $table->timestamp('backdate_start_date')->nullable();
            $table->timestamp('billing_cycle_anchor')->nullable();
            $table->json('billing_cycle_anchor_config')->nullable();
            $table->json('billing_thresholds')->nullable();
            $table->timestamp('cancel_at')->nullable();
            $table->enum('collection_method', ['charge_automatically', 'send_invoice'])->nullable();
            $table->string('coupon')->nullable();
            $table->integer('days_until_due')->nullable();
            $table->string('default_source')->nullable();
            $table->json('default_tax_rates')->nullable();
            $table->json('discounts')->nullable();
            $table->json('invoice_settings')->nullable();
            $table->boolean('off_session')->nullable();
            $table->string('on_behalf_of')->nullable();
            $table->json('payment_settings')->nullable();
            $table->json('pending_invoice_item_interval')->nullable();
            $table->string('promotion_code')->nullable();
            $table->enum('proration_behavior', ['always_invoice', 'create_prorations', 'none'])->nullable();
            $table->json('transfer_data')->nullable();
            $table->boolean('trial_from_plan')->nullable();
            $table->timestamp('trial_end')->nullable();
            $table->json('trial_settings')->nullable();
            $table->timestamp('trial_start')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
