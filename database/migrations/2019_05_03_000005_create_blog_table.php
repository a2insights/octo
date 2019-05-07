<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'blog';

    /**
     * Run the migrations.
     * @table blog
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('theme', 45)->default('clean');
            $table->string('name', 45);
            $table->text('description')->nullable();
            $table->string('sub_domain', 45)->nullable();
            $table->string('guard_name', 45)->nullable();

            $table->index(["user_id"], 'fk_blog_users1_idx');

            $table->unique(["id"], 'id_UNIQUE');
            $table->nullableTimestamps();


            $table->foreign('user_id', 'fk_blog_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
