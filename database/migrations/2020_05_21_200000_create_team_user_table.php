<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamUserTable extends Migration
{
<<<<<<< HEAD
=======
    /**
     * Run the migrations.
     *
     * @return void
     */
>>>>>>> f876da8... Add email verification dev
    public function up()
    {
        Schema::create('team_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id');
            $table->foreignId('user_id');
            $table->string('role')->nullable();
            $table->timestamps();

            $table->unique(['team_id', 'user_id']);
        });
    }

<<<<<<< HEAD
=======
    /**
     * Reverse the migrations.
     *
     * @return void
     */
>>>>>>> f876da8... Add email verification dev
    public function down()
    {
        Schema::dropIfExists('team_user');
    }
}
