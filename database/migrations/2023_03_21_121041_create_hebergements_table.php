<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hebergements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('participant_id');
            $table->foreign('participant_id')->references('id')->on('participants');
            $table->string('site_heberg');
            $table->boolean('type_cham');
            $table->dateTime('date_checkin');
            $table->dateTime('date_checkout');
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
        Schema::dropIfExists('hebergements');
    }
};