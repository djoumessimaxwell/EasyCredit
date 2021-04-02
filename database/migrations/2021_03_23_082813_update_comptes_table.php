<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comptes', function (Blueprint $table) {
            $table->string('Account_number')->unique()->nullable();
            $table->integer('ProductId')->nullable();
            $table->integer('UserId')->nullable()->change();
            $table->integer('Client_entId')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comptes', function($table) {
            $table->dropColumn('Account_number');
            $table->dropColumn('ProductId');
            $table->integer('UserId')->nullable(false)->change();
            $table->dropColumn('Client_entId');
        });
    }
}
