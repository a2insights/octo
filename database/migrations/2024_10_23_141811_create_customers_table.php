<?php

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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('stripe_id')->nullable();
            $table->json('address')->nullable();
            $table->string('description')->nullable();
            $table->string('email')->nullable();
            $table->json('metadata')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->json('shipping')->nullable();
            $table->json('cash_balance')->nullable();
            $table->integer('balance')->nullable();
            $table->json('default_source')->nullable();
            $table->boolean('delinquent')->nullable();
            $table->json('discount')->nullable();
            $table->json('invoice_credit_balance')->nullable();
            $table->string('invoice_prefix')->nullable();
            $table->json('invoice_settings')->nullable();
            $table->boolean('livemode')->nullable();
            $table->integer('next_invoice_sequence')->nullable();
            $table->json('preferred_locales')->nullable();
            $table->json('sources')->nullable();
            $table->json('subscriptions')->nullable();
            $table->enum('tax_exempt', ["exempt","none","reverse"])->nullable();
            $table->json('tax')->nullable();
            $table->json('tax_ids')->nullable();
            $table->string('test_clock')->nullable();
            $table->timestamp('created')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
