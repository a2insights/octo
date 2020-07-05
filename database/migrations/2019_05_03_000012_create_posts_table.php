<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    public $tableName = 'posts';

    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title', 150);
            $table->unsignedInteger('blog_id');
            $table->text('content')->nullable()->default(null);

            $table->index(["blog_id"], 'fk_posts_blog1_idx');
            $table->nullableTimestamps();


            $table->foreign('blog_id', 'fk_posts_blog1_idx')
                ->references('id')->on('blogs')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
