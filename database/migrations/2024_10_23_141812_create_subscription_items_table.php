<?php

use App\Models\Subscription;
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
        Schema::create('subscription_items', function (Blueprint $table) {
            $table->id();
            $table->string('stripe_id')->nullable();
            $table->foreignIdFor(Subscription::class)->constrained()->cascadeOnDelete();
            $table->string('stripe_subscription')->nullable();
            $table->string('product')->nullable();
            $table->json('stripe_price')->nullable();
            $table->unsignedBigInteger('quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_items');
    }
};
