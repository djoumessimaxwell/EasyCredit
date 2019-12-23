<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vols', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nom')->unique();
            $table->string('AeroportDépart');
            $table->string('AeroportArrivée');
            $table->date('DateDépart');
            $table->time('HeureDépart');
            $table->date('DateArrivée');
            $table->time('HeureArrivée');
            $table->string('Escale');
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
        Schema::dropIfExists('vols');
    }
}
