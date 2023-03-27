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
        Schema::create('restaurations', function (Blueprint $table) {
            $table->id();
            $table->string('numero_rest')->nullable();
            $table->string('site_restau');
            $table->string('ville');
            $table->string('prestataire');
            $table->unsignedBigInteger('rep_id');
            $table->unsignedBigInteger('participant_id')->unique();
            $table->foreign('rep_id')->references('id')->on('repas');
            $table->foreign('participant_id')->references('id')->on('participants')->onDelete('cascade');
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
        Schema::dropIfExists('restaurations');
    }
};
