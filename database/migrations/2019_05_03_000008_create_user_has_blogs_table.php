<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHasBlogsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'user_has_blogs';

    /**
     * Run the migrations.
     * @table user_has_blogs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('blog_id');
            $table->unsignedInteger('user_id');

            $table->index(["user_id"], 'fk_user_has_blogs_users1_idx');

            $table->index(["blog_id"], 'fk_users_has_tenancys_tenancys1_idx');


            $table->foreign('blog_id', 'fk_users_has_tenancys_tenancys1_idx')
                ->references('id')->on('blog')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('user_id', 'fk_user_has_blogs_users1_idx')
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
