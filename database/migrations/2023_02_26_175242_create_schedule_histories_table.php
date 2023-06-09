<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class CreateScheduleHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Config::get('filament-database-schedule.table.schedule_histories', 'schedule_histories'), function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('schedule_id');
            $table->string('command');
            $table->text('params')->nullable();
            $table->text('output');
            $table->text('options')->nullable();
            $table->timestamps();
            $table->foreign('schedule_id')->references('id')->on(Config::get('filament-database-schedule.table.schedules', 'schedules'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('filament-database-schedule.table.schedule_histories', 'schedule_histories'));
    }
}
