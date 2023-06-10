<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (! Schema::hasTable('bans')) {
            Schema::create('bans', function (Blueprint $table) {
                $table->increments('id');
                $table->morphs('bannable');
                $table->nullableMorphs('created_by');
                $table->text('comment')->nullable();
                $table->timestamp('expired_at')->nullable();
                $table->softDeletes();
                $table->timestamps();

                $table->index('expired_at');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('bans')) {
            Schema::dropIfExists('bans');
        }
    }
};
