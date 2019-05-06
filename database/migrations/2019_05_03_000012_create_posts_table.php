<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'posts';

    /**
     * Run the migrations.
     * @table posts
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('user_has_blog_id');
            $table->string('name', 150);
            $table->text('content')->nullable();

            $table->index(["user_has_blog_id"], 'fk_posts_users_has_tenancys1_idx');
            $table->nullableTimestamps();


            $table->foreign('user_has_blog_id', 'fk_posts_users_has_tenancys1_idx')
                ->references('id')->on('user_has_blogs')
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
