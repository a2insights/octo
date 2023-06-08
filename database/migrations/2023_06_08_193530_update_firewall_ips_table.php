<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('firewall_ips', function (Blueprint $table) {
            $table->integer('prefix_size')->nullable()->after('ip');
        });
    }

    public function down(): void
    {
        Schema::table('firewall_ips', function (Blueprint $table) {
            $table->dropColumn('prefix_size');
        });
    }
};
