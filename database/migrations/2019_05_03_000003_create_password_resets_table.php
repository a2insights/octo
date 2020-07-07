<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    public $tableName = 'password_resets';

    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tenant_id')->nullable();
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at')->nullable()->default(null);

            $table->index(["email"], 'password_resets_email_index');
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
