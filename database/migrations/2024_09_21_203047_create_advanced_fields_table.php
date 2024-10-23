<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        $tableNames = config('filament-field-group.table_names');

        Schema::create($tableNames['field_groups'], function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('name')->unique();
            $table->boolean('active')->default(true);
            $table->integer('sort')->default(0);

            $table->timestamps();
        });

        Schema::create($tableNames['fields'], function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('label');
            $table->string('type');
            $table->integer('group_id')->default(0);
            $table->integer('sort')->default(0);

            $table->text('instructions')->nullable();
            $table->boolean('mandatory')->default(false);
            $table->string('state_path')->nullable();
            $table->json('config')->nullable();

            $table->unique(['name', 'group_id']);

            $table->timestamps();
        });
    }

    public function down()
    {
        $tableNames = config('filament-field-group.table_names');

        Schema::dropIfExists($tableNames['fields']);
        Schema::dropIfExists($tableNames['field_groups']);
    }
};
