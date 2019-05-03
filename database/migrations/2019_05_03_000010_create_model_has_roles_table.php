<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelHasRolesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'model_has_roles';

    /**
     * Run the migrations.
     * @table model_has_roles
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('role_id');
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');

            $table->index(["model_id", "model_type"], 'model_has_roles_model_id_model_type_index');


            $table->foreign('role_id', 'model_has_roles_role_id')
                ->references('id')->on('roles')
                ->onDelete('cascade')
                ->onUpdate('restrict');
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
