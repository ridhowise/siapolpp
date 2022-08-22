<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTpp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('month', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->date('awal')->nullable();
            $kolom->date('akhir')->nullable();
            $kolom->string('status');
            $kolom->timestamps();
        });

        Schema::create('days', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->date('date')->nullable();
            $kolom->time('timet')->nullable();
            $kolom->time('timep')->nullable();
            $kolom->unsignedInteger('month_id')->nullable();
            $kolom->timestamps();
        });

 		Schema::table('days', function (Blueprint $kolom) {
            $kolom->foreign('month_id')->references('id')->on('month')->onDelete('cascade')->onUpdate('cascade');

        });

        Schema::create('produktifitas', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->unsignedInteger('month_id')->nullable();
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->string('file')->nullable();
            $kolom->string('total');
            $kolom->timestamps();
        });

 		Schema::table('produktifitas', function (Blueprint $kolom) {
            $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('month_id')->references('id')->on('month')->onDelete('cascade')->onUpdate('cascade');

        });

        Schema::create('kinerja', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('kinerja')->nullable();
            $kolom->integer('kuantitast')->nullable();
            $kolom->string('outputt')->nullable();
            $kolom->integer('kuantitasr')->nullable();
            $kolom->string('outputr')->nullable();
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->unsignedInteger('produktifitas_id')->nullable();
            $kolom->string('total');
            $kolom->timestamps();
        });

 		Schema::table('kinerja', function (Blueprint $kolom) {
            $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('produktifitas_id')->references('id')->on('produktifitas')->onDelete('cascade')->onUpdate('cascade');

        });
        
        

        Schema::create('disiplin', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('total')->nullable();
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->unsignedInteger('month_id')->nullable();
            $kolom->string('file')->nullable();
            $kolom->timestamps();
        });

 		Schema::table('disiplin', function (Blueprint $kolom) {
            $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('month_id')->references('id')->on('month')->onDelete('cascade')->onUpdate('cascade');

        });

        Schema::create('finger', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->date('date')->nullable();
            $kolom->time('timet')->nullable();
            $kolom->time('timep')->nullable();
            $kolom->time('timetf')->nullable();
            $kolom->time('timepf')->nullable();
            $kolom->string('persentaset')->nullable();
            $kolom->string('persentasep')->nullable();
            $kolom->unsignedInteger('disiplin_id')->nullable();
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->string('total')->nullable();
            $kolom->string('status')->nullable();
            $kolom->timestamps();
        });

 		Schema::table('finger', function (Blueprint $kolom) {
            $kolom->foreign('disiplin_id')->references('id')->on('disiplin')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('total', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->unsignedInteger('month_id')->nullable();
            $kolom->string('tpp')->nullable();
            $kolom->string('disiplin')->nullable();
            $kolom->string('produktifitas')->nullable();
            $kolom->timestamps();
        });

 		Schema::table('total', function (Blueprint $kolom) {
            
            $kolom->foreign('month_id')->references('id')->on('month')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');


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
