<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Octo\Marketing\Enums\CampaignContactStatus;

class CreateCampaingnContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campaign_id')->nullable();
            $table->integer('contact_id')->nullable();
            $table->string('status')->default(CampaignContactStatus::PENDING());
            $table->string('model_type')->nullable();
            $table->dateTime('notified_at')->nullable();
            $table->json('data')->nullable();
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
        Schema::dropIfExists('campaign_contact');
    }
}
