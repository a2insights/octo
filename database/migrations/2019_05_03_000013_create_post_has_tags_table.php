<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostHasTagsTable extends Migration
{
    public $tableName = 'post_has_tags';

    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('tag_id');
            $table->unsignedInteger('post_id');

            $table->index(["tag_id"], 'fk_tags_has_posts_tags1_idx');

            $table->index(["post_id"], 'fk_tags_has_posts_posts1_idx');

            $table->unique(["id"], 'id_UNIQUE_post_has_tags');


            $table->foreign('post_id', 'fk_tags_has_posts_posts1_idx')
                ->references('id')->on('posts')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('tag_id', 'fk_tags_has_posts_tags1_idx')
                ->references('id')->on('tags')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
