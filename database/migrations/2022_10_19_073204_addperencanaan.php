<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Addperencanaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('dokumen', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('nama')->nullable();
            $kolom->string('tipe')->nullable();
            $kolom->string('tahun')->nullable();
            $kolom->string('file')->nullable();
            $kolom->timestamps();
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
