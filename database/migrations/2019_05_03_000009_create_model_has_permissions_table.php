<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelHasPermissionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'model_has_permissions';

    /**
     * Run the migrations.
     * @table model_has_permissions
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('permission_id');
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');

            $table->index(["model_id", "model_type"], 'model_has_permissions_model_id_model_type_index');


            $table->foreign('permission_id', 'model_has_permissions_permission_id')
                ->references('id')->on('permissions')
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
