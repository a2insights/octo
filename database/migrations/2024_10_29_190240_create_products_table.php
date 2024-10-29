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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable(); // plan, service, sku, feature
            $table->string('stripe_id')->nullable();
            $table->string('name')->nullable();
            $table->boolean('active')->nullable()->default(true);
            $table->bigInteger('created')->nullable();
            $table->string('default_price')->nullable();
            $table->json('default_price_data')->nullable();
            $table->string('description')->nullable();
            $table->json('images')->nullable();
            $table->json('marketing_features')->nullable();
            $table->boolean('livemode')->default(false);
            $table->json('metadata')->nullable();
            $table->json('package_dimensions')->nullable();
            $table->boolean('shippable')->nullable()->default(false);
            $table->string('statement_descriptor')->nullable();
            $table->string('tax_code')->nullable();
            $table->string('unit_label')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
