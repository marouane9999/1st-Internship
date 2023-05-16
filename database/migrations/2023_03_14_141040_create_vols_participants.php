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
        Schema::create('vols_participants', function (Blueprint $table) {
            $table->id();
            $table->boolean('statut')->default(0);
            $table->unsignedBigInteger('participant_id');
            $table->unsignedBigInteger('vol_id');
            $table->foreign('participant_id')->references('id')->on('participants')->onDelete('cascade');
            $table->foreign('vol_id')->references('id')->on('vols')->onDelete('cascade');
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
        Schema::dropIfExists('vols_participants');
    }
};
