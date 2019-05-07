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
            $table->string('name', 150);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('blog_id');
            $table->text('content')->nullable();

            $table->index(["user_id"], 'fk_posts_users1_idx');

            $table->index(["blog_id"], 'fk_posts_blog1_idx');
            $table->nullableTimestamps();


            $table->foreign('blog_id', 'fk_posts_blog1_idx')
                ->references('id')->on('blog')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('user_id', 'fk_posts_users1_idx')
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
