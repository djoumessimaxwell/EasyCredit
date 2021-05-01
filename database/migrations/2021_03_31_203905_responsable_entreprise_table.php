<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ResponsableEntrepriseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsable_ents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('client_entId');
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('CNI_number')->unique()->nullable();
            $table->datetime('CNI_date')->nullable();
            $table->string('CNI_place')->nullable();
            $table->string('poste')->nullable();
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
        Schema::dropIfExists('responsable_ents');
    }
}
