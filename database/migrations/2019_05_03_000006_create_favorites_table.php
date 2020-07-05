<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration
{
    public $tableName = 'favorites';

    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('model_type', 150);
            $table->integer('model_id');
            $table->integer('user_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
