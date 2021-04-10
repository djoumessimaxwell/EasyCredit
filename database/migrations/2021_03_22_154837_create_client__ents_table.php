<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientEntsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_ents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Raison_sociale');
            $table->string('Forme_juridique');
            $table->string('phone')->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('Numero_contribuable')->unique();
            $table->timestamp('NC_date')->nullable();
            $table->string('Siege');
            $table->string('Activité');
            $table->string('SiteWeb')->nullable();
            $table->string('password');
            $table->integer('is_deleted')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('client_ents');
    }
}
