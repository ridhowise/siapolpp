<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createusertahun extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tahunan', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('tahun')->nullable();

           
            $kolom->timestamps();
        });

        Schema::create('usertahun', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->unsignedInteger('tahun_id')->nullable();
            $kolom->unsignedInteger('user_id')->nullable();
           
            $kolom->timestamps();
        });

        Schema::table('usertahun', function (Blueprint $kolom) {
            $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('tahun_id')->references('id')->on('tahunan')->onDelete('cascade')->onUpdate('cascade');


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
