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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('nom_par');
            $table->string('prenom_par');
            $table->boolean('genre');
            $table->string('discipline');
            $table->string('num_pass')->unique();
            $table->string('num_acc')->nullable();
            $table->string('pays_delg');
            $table->string('site_compet');
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('chefM_id');
            $table->foreign('chefM_id')->references('id')->on('chef_missions');
            $table->foreign('cat_id')->references('id')->on('categories');
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
        Schema::dropIfExists('participants');
    }
};
