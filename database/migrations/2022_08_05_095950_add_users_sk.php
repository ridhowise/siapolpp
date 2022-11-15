<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersSk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('tanggal')->nullable()->after('tempat');
            $table->string('telepon')->nullable()->after('tanggal');
            $table->string('pendidikan')->nullable()->after('telepon');
            $table->string('diklat')->nullable()->after('telepon');
            $table->string('jenisjabatan')->nullable()->after('telepon');
            $table->string('nosk')->nullable()->after('telepon');
            $table->string('nik')->nullable()->after('telepon');
            $table->string('nokk')->nullable()->after('telepon');
            $table->string('gender')->nullable()->after('telepon');
            $table->string('tingkattpp')->nullable()->after('telepon');

    

        });

        Schema::create('file', function (Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('file');
        	$kolom->string('tipe')->nullable();
            $kolom->unsignedInteger('user_id')->nullable();
            $kolom->timestamps();
        });

 		Schema::table('file', function (Blueprint $kolom) {
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
        
    }
}
