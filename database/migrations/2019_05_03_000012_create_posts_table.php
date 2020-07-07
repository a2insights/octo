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
            $table->increments('id');
            $table->unsignedInteger('blog_id');
            $table->unsignedInteger('tenant_id');
            $table->string('title', 150);
            $table->text('content')->nullable()->default(null);

            $table->index(["tenant_id"], 'fk_posts_tenants1_idx');

            $table->index(["blog_id"], 'fk_posts_blogs1_idx');
            $table->nullableTimestamps();


            $table->foreign('tenant_id', 'fk_posts_tenants1_idx')
                ->references('id')->on('tenants')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('blog_id', 'fk_posts_blogs1_idx')
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
