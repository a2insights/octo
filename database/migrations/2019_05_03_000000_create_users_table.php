<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public $tableName = 'users';

    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('blog_id');
            $table->string('name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->string('password');
            $table->rememberToken();

            $table->index(["blog_id"], 'fk_users_blogs1_idx');

            $table->unique(["email"], 'users_email_unique');
            $table->nullableTimestamps();


            $table->foreign('blog_id', 'fk_users_blogs1_idx')
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
