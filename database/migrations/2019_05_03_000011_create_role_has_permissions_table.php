<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleHasPermissionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'role_has_permissions';

    /**
     * Run the migrations.
     * @table role_has_permissions
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('permission_id');
            $table->unsignedInteger('role_id');

            $table->index(["role_id"], 'role_has_permissions_role_id_foreign');


            $table->foreign('permission_id', 'role_has_permissions_permission_id')
                ->references('id')->on('permissions')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('role_id', 'role_has_permissions_role_id_foreign')
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
