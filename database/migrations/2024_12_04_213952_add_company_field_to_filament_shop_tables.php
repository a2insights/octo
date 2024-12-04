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
        Schema::table('filament_shop_categories', function (Blueprint $table) {
            $table->foreignId('company_id')->after('id')->nullable()->constrained()->cascadeOnDelete();
        });

        Schema::table('filament_shop_products', function (Blueprint $table) {
            $table->foreignId('company_id')->after('id')->nullable()->constrained()->cascadeOnDelete();
        });

        Schema::table('filament_shop_brands', function (Blueprint $table) {
            $table->foreignId('company_id')->after('id')->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('filament_shop_categories', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
        });

        Schema::table('filament_shop_products', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
        });

        Schema::table('filament_shop_brands', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
        });
    }
};
