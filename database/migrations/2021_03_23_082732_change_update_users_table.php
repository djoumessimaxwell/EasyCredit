<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('CNI_number')->unique()->nullable();
            $table->timestamp('CNI_date')->nullable();
            $table->string('CNI_place')->nullable();
            $table->string('job')->nullable();
            $table->string('toContact_name')->nullable();
            $table->string('toContact_phone')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('CNI_number');
            $table->dropColumn('CNI_date');
            $table->dropColumn('CNI_place');
            $table->dropColumn('job');
            $table->dropColumn('toContact_name');
            $table->dropColumn('toContact_phone');
        });
    }
}
