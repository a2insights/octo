<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    public $tableName = 'tags';

    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tenant_id');
            $table->string('name', 45);
            $table->string('description', 150)->nullable()->default(null);

            $table->index(["tenant_id"], 'fk_tags_tenants1_idx');

            $table->unique(["name"], 'name_UNIQUE');

            $table->unique(["id"], 'id_UNIQUE');


            $table->foreign('tenant_id', 'fk_tags_tenants1_idx')
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
