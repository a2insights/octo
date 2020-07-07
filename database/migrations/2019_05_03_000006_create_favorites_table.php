<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration
{
    public $tableName = 'favorites';

    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tenant_id');
            $table->string('model_type', 150);
            $table->integer('model_id');
            $table->integer('user_id');

            $table->index(["tenant_id"], 'fk_favorites_tenants1_idx');


            $table->foreign('tenant_id', 'fk_favorites_tenants1_idx')
                ->references('id')->on('tenants')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
