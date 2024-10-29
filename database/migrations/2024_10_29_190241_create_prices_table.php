<?php

use A21ns1g4ts\FilamentStripe\Models\Product;
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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->string('stripe_id')->nullable();
            $table->string('stripe_product')->nullable();
            $table->boolean('active')->nullable();
            $table->string('currency')->nullable();
            $table->json('metadata')->nullable();
            $table->string('nickname')->nullable();
            $table->json('recurring')->nullable();
            $table->string('type')->nullable();
            $table->integer('unit_amount')->nullable();
            $table->string('unit_label')->nullable();
            $table->string('billing_scheme')->nullable();
            $table->bigInteger('created')->nullable();
            $table->json('currency_options')->nullable();
            $table->json('custom_unit_amount')->nullable();
            $table->boolean('livemode')->nullable();
            $table->string('lookup_key')->nullable();
            $table->boolean('transfer_lookup_key')->nullable();
            $table->string('tax_behavior')->nullable();
            $table->json('tiers')->nullable();
            $table->string('tiers_mode')->nullable();
            $table->json('transform_quantity')->nullable();
            $table->string('unit_amount_decimal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
