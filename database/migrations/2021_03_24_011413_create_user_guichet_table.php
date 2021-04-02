<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGuichetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_guichet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('GuichetId');
            $table->integer('UserId')->nullable();
            $table->integer('Client_entId')->nullable();
            $table->integer('MarchandId')->nullable();
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
        Schema::dropIfExists('user_guichet');
    }
}
