<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    public $tableName = 'blogs';

    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('theme', 45)->default('clean');
            $table->string('name', 45);
            $table->text('description')->nullable()->default(null);
            $table->string('sub_domain', 45)->nullable()->default(null);
            $table->string('guard_name', 45)->nullable()->default(null);

            $table->unique(["id"], 'id_UNIQUE_blog');
            $table->nullableTimestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
