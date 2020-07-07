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
            $table->increments('id');
            $table->unsignedInteger('tenant_id');
            $table->unsignedInteger('user_id');
            $table->string('theme', 45)->default('clean');
            $table->string('name', 45);
            $table->text('description')->nullable()->default(null);
            $table->string('path', 45);

            $table->index(["tenant_id"], 'fk_blogs_tenants1_idx');

            $table->index(["user_id"], 'fk_blogs_users1_idx');

            $table->unique(["id"], 'id_UNIQUE_blog');
            $table->nullableTimestamps();


            $table->foreign('tenant_id', 'fk_blogs_tenants1_idx')
                ->references('id')->on('tenants')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('user_id', 'fk_blogs_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
