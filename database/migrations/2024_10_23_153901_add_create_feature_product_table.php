<?php

use App\Models\Feature;
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
        Schema::create('feature_product', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class, 'product_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Feature::class, 'feature_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Price::class, 'price_id')->nullable()->constrained()->cascadeOnDelete();
            $table->unsignedInteger('sort')->default(0);
            $table->integer('unit_amount')->nullable();
            $table->integer('value')->nullable();
            $table->boolean('resetable')->default(false);
            $table->boolean('unlimited')->default(false);
            $table->boolean('meteread')->default(false);
            $table->timestamps();
            $table->unique(['product_id', 'feature_id', 'price_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_product');
    }
};
