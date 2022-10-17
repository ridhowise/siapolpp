<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Addsurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indeks', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('kode')->nullable();
            $kolom->string('judul')->nullable();
            $kolom->string('detail')->nullable();
            $kolom->timestamps();
        });

        Schema::create('suratmasuk', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('nosurat')->nullable();
        	$kolom->string('judulsurat')->nullable();
            $kolom->string('asalsurat')->nullable();
            $kolom->date('tanggalmasuk')->nullable();
            $kolom->date('tanggalterima')->nullable();
            $kolom->string('keterangan')->nullable();
            $kolom->string('file')->nullable();
            $kolom->unsignedInteger('indeks_id')->nullable();
            $kolom->timestamps();
        });

 		Schema::table('suratmasuk', function (Blueprint $kolom) {
            $kolom->foreign('indeks_id')->references('id')->on('indeks')->onDelete('cascade')->onUpdate('cascade');


        });
        
        Schema::create('suratkeluar', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('nosurat')->nullable();
        	$kolom->string('judulsurat')->nullable();
            $kolom->string('asalsurat')->nullable();
            $kolom->date('tanggalkeluar')->nullable();
            $kolom->string('keterangan')->nullable();
            $kolom->string('tujuan')->nullable();
            $kolom->string('file')->nullable();
            $kolom->unsignedInteger('indeks_id')->nullable();
            $kolom->timestamps();
        });

 		Schema::table('suratkeluar', function (Blueprint $kolom) {
            $kolom->foreign('indeks_id')->references('id')->on('indeks')->onDelete('cascade')->onUpdate('cascade');


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
