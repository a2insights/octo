<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddDefaultThemeToThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('themes')->insert([
            'name' => 'Octo',
            'slug' => 'octo',
            'description' => 'This project was created to help other developers makes web app in a easy way using TALL Stack.',
            'author' => 'Octo',
            'license' => 'MIT',
            'active' => true,
            'private' => false,
            'token' => null,
            'secret' => null,
            'version' => '0.0.1',
            'thumbnail' => null,
            'repository_url' => 'https://github.com/a2insights/octo-theme.git',
            'packagist_url' => null,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('themes', function (Blueprint $table) {
            //
        });
    }
}
