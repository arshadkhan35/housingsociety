<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userDetails', function (Blueprint $table) {
            $table->integer('userid')->unsigned()->nullable();
            $table->foreign('userid')->references('id')->on('users');
            $table->string('fullName');
            $table->string('mobileno');
            $table->string('email');
            $table->integer('buildingno');
            $table->string('wing');
            $table->integer('Floor');
            $table->integer('roomno');
            $table->string('fatherName');
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
        //
    }
}
