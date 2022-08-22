<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('name');  
			$kolom->timestamps();
        });

        Schema::create('golongan', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('name');  
			$kolom->timestamps();
        });

        Schema::create('users', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->unsignedInteger('level_id')->nullable();
            $kolom->unsignedInteger('golongan_id')->nullable();
            $kolom->string('salary')->nullable();
            $kolom->string('name');
            $kolom->string('unit')->nullable();
            $kolom->string('email')->unique();
            $kolom->string('images')->nullable();
            $kolom->string('nip')->nullable();
            $kolom->string('password');
            $kolom->rememberToken();
            $kolom->timestamps();
        });
      
        Schema::table('users', function (Blueprint $kolom) {
		  $kolom->foreign('level_id')->references('id')->on('levels')->onDelete('cascade')->onUpdate('cascade');
		  $kolom->foreign('golongan_id')->references('id')->on('golongan')->onDelete('cascade')->onUpdate('cascade');

        });

       
      // barang BARANG

         Schema::create('barang', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('nama')->nullable();
            $kolom->string('tipe')->nullable();
            $kolom->integer('jumlah')->nullable();
            $kolom->integer('max')->nullable();
            $kolom->string('satuan')->nullable();
            $kolom->integer('harga')->nullable();
            $kolom->timestamps();
        });

         Schema::create('masuk', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('file');
        	$kolom->date('tanggal')->nullable();
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->timestamps();
        });

 		Schema::table('masuk', function (Blueprint $kolom) {
            $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');


        });

         Schema::create('barangmasuk', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->date('tanggal')->nullable();
            $kolom->integer('masuk')->nullable();
            $kolom->unsignedInteger('masuk_id')->nullable();
            $kolom->unsignedInteger('barang_id')->nullable();
            $kolom->integer('total')->nullable();
            $kolom->timestamps();
        });
      
        Schema::table('barangmasuk', function (Blueprint $kolom) {
            $kolom->foreign('masuk_id')->references('id')->on('masuk')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade')->onUpdate('cascade');



        });

         Schema::create('keluar', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('file')->nullable();
            $kolom->string('surat')->nullable();
            $kolom->string('status');
            $kolom->date('tanggal')->nullable();
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->timestamps();
        });

 		Schema::table('keluar', function (Blueprint $kolom) {
            $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');


        });

         Schema::create('barangkeluar', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->date('tanggal')->nullable();
            $kolom->integer('keluar')->nullable();
            $kolom->unsignedInteger('keluar_id')->nullable();
            $kolom->unsignedInteger('barang_id')->nullable();
            $kolom->integer('total')->nullable();
            $kolom->string('status');

            $kolom->timestamps();
        });
      
        Schema::table('barangkeluar', function (Blueprint $kolom) {
            $kolom->foreign('keluar_id')->references('id')->on('keluar')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade')->onUpdate('cascade');



        });
        Schema::create('tahun', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('tahun')->nullable();
            $kolom->timestamps();
        });

        Schema::create('kibb', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('kode')->nullable();
            $kolom->string('nama')->nullable();
            $kolom->string('register')->nullable();
            $kolom->string('merk')->nullable();
            $kolom->string('ukuran')->nullable();
            $kolom->string('bahan')->nullable();
            $kolom->unsignedInteger('tahun_id')->nullable();
            $kolom->string('pabrik')->nullable();
            $kolom->string('rangka')->nullable();
            $kolom->string('mesin')->nullable();
            $kolom->string('polisi')->nullable();
            $kolom->string('bpkb')->nullable();
            $kolom->string('asal')->nullable();
            $kolom->string('harga')->nullable();
            $kolom->string('keterangan')->nullable();
            $kolom->string('serial')->nullable();
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->string('status')->nullable();
            $kolom->string('file')->nullable();
            $kolom->string('filee')->nullable();

            $kolom->timestamps();
        });
      
        Schema::table('kibb', function (Blueprint $kolom) {
            $kolom->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('tahun_id')->references('id')->on('tahun')->onDelete('cascade')->onUpdate('cascade');

        });

        Schema::create('kibc', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('kode')->nullable();
            $kolom->string('nama')->nullable();
            $kolom->string('register')->nullable();
            $kolom->string('kondisi')->nullable();
            $kolom->string('bertingkat')->nullable();
            $kolom->string('beton')->nullable();
            $kolom->string('luaslantai')->nullable();
            $kolom->string('letak')->nullable();
            $kolom->date('tanggal')->nullable();
            $kolom->string('nomor')->nullable();
            $kolom->string('luas')->nullable();
            $kolom->string('statustanah')->nullable();
            $kolom->string('kodetanah')->nullable();
            $kolom->string('asal')->nullable();
            $kolom->string('harga')->nullable();
            $kolom->string('keterangan')->nullable();
            $kolom->string('status')->nullable();
            $kolom->timestamps();
        });
        Schema::create('kibd', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('kode')->nullable();
            $kolom->string('nama')->nullable();
            $kolom->string('register')->nullable();
            $kolom->string('konstruksi')->nullable();
            $kolom->string('panjang')->nullable();
            $kolom->string('lebar')->nullable();
            $kolom->string('luas')->nullable();
            $kolom->string('letak')->nullable();
            $kolom->date('tanggal')->nullable();
            $kolom->string('nomor')->nullable();
            $kolom->string('statustanah')->nullable();
            $kolom->string('kodetanah')->nullable();
            $kolom->string('asal')->nullable();
            $kolom->string('harga')->nullable();
            $kolom->string('kondisi')->nullable();
            $kolom->string('keterangan')->nullable();
            $kolom->string('status')->nullable();
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
        
    }
}
