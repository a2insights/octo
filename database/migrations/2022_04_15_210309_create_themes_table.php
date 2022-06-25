<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('title');
            $table->string('description')->nullable();

            $table->string('author');
            $table->string('license');

            $table->boolean('active')->default(false);
            $table->boolean('installed')->default(false);

            $table->boolean('private')->default(false);

            $table->string('token')->nullable();
            $table->string('secret')->nullable();

            $table->string('version');

            $table->string('thumbnail')->nullable();
            $table->string('repository_url')->nullable();
            $table->string('packagist_url')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('themes');
    }
}
