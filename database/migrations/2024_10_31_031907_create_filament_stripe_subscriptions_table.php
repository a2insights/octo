<?php

use A21ns1g4ts\FilamentStripe\Models\Customer;
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
        Schema::create(config('filament-stripe.table_names.subscriptions'), function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Customer::class)->constrained()->cascadeOnDelete();
            $table->string('stripe_id')->nullable();
            $table->string('stripe_price')->nullable();
            $table->enum('status', ['incomplete', 'incomplete_expired', 'trialing', 'active', 'past_due', 'canceled', 'unpaid', 'or paused'])->index()->nullable();
            $table->boolean('cancel_at_period_end')->nullable()->default(false);
            $table->enum('currency', ['usd', 'aed', 'afn', 'all', 'amd', 'ang', 'aoa', 'ars', 'aud', 'awg', 'azn', 'bam', 'bbd', 'bdt', 'bgn', 'bif', 'bmd', 'bnd', 'bob', 'brl', 'bsd', 'bwp', 'byn', 'bzd', 'cad', 'cdf', 'chf', 'clp', 'cny', 'cop', 'crc', 'cve', 'czk', 'djf', 'dkk', 'dop', 'dzd', 'egp', 'etb', 'eur', 'fjd', 'fkp', 'gbp', 'gel', 'gip', 'gmd', 'gnf', 'gtq', 'gyd', 'hkd', 'hnl', 'htg', 'huf', 'idr', 'ils', 'inr', 'isk', 'jmd', 'jpy', 'kes', 'kgs', 'khr', 'kmf', 'krw', 'kyd', 'kzt', 'lak', 'lbp', 'lkr', 'lrd', 'lsl', 'mad', 'mdl', 'mga', 'mkd', 'mmk', 'mnt', 'mop', 'mur', 'mvr', 'mwk', 'mxn', 'myr', 'mzn', 'nad', 'ngn', 'nio', 'nok', 'npr', 'nzd', 'pab', 'pen', 'pgk', 'php', 'pkr', 'pln', 'pyg', 'qar', 'ron', 'rsd', 'rub', 'rwf', 'sar', 'sbd', 'scr', 'sek', 'sgd', 'shp', 'sle', 'sos', 'srd', 'std', 'szl', 'thb', 'tjs', 'top', 'try', 'ttd', 'twd', 'tzs', 'uah', 'ugx', 'uyu', 'uzs', 'vnd', 'vuv', 'wst', 'xaf', 'xcd', 'xof', 'xpf', 'yer', 'zar', 'zmw'])->nullable();
            $table->integer('current_period_end')->nullable();
            $table->integer('current_period_start')->nullable();
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
            $table->integer('backdate_start_date')->nullable();
            $table->integer('billing_cycle_anchor')->nullable();
            $table->json('billing_cycle_anchor_config')->nullable();
            $table->json('billing_thresholds')->nullable();
            $table->integer('cancel_at')->nullable();
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
            $table->integer('trial_end')->nullable();
            $table->json('trial_settings')->nullable();
            $table->integer('trial_start')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
