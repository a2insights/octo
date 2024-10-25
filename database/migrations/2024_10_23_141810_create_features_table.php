<?php

use App\Models\Price;
use App\Models\Product;
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
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Price::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->string('stripe_id')->nullable();
            $table->boolean('active')->default(true);
            $table->json('metadata')->nullable();
            $table->string('stripe_price')->nullable();
            $table->boolean('livemode')->default(false);
            $table->string('lookup_key')->nullable();
            $table->bigInteger('value')->nullable();
            $table->string('name')->nullable();
            $table->boolean('resetable')->default(false);
            $table->boolean('unlimited')->default(false);
            $table->boolean('meteread')->default(false);
            $table->string('unit')->nullable();
            $table->integer('unit_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
