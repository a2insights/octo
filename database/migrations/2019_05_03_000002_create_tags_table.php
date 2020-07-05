<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    public $tableName = 'tags';

    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 45);
            $table->string('description', 150)->nullable()->default(null);

            $table->unique(["name"], 'name_UNIQUE');

            $table->unique(["id"], 'id_UNIQUE');
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
