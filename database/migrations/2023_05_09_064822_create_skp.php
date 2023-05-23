<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

    
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('atasan_id')->nullable()->after('telepon');
        });

            Schema::table('users', function (Blueprint $table) {
                $table->foreign('atasan_id')->references('id')->on('levels')->onDelete('cascade')->onUpdate('cascade');


        });

        Schema::create('skp', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('tahun')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();


        });
        Schema::table('skp', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

    });

        Schema::create('rencana', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('rencana')->nullable();
            $table->string('intervensi')->nullable();
            $table->unsignedInteger('skp_id')->nullable();
            $table->timestamps();


        });
        Schema::table('rencana', function (Blueprint $table) {
            $table->foreign('skp_id')->references('id')->on('skp')->onDelete('cascade')->onUpdate('cascade');

    });
        
        Schema::create('indikator', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('indikator')->nullable();
            $table->unsignedInteger('rencana_id')->nullable();
            $table->string('target')->nullable();
            $table->string('realisasi')->nullable();
            $table->string('umpan')->nullable();
            $table->timestamps();

        });

        Schema::table('indikator', function (Blueprint $table) {
            $table->foreign('rencana_id')->references('id')->on('rencana')->onDelete('cascade')->onUpdate('cascade');

    });
        
    Schema::create('akhlak', function (Blueprint $table) {
        $table->increments('id')->nullable();
        $table->string('akhlak')->nullable();
        $table->timestamps();


    });
    
    Schema::create('ekspetasi', function (Blueprint $table) {
        $table->increments('id')->nullable();
        $table->string('ekspetasi')->nullable();
        $table->string('umpan')->nullable();
        $table->unsignedInteger('akhlak_id')->nullable();
        $table->unsignedInteger('skp_id')->nullable();
        $table->timestamps();


    });
    Schema::table('ekspetasi', function (Blueprint $table) {
        $table->foreign('skp_id')->references('id')->on('skp')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('akhlak_id')->references('id')->on('akhlak')->onDelete('cascade')->onUpdate('cascade');

});

Schema::create('hasilskp', function (Blueprint $table) {
    $table->increments('id')->nullable();
    $table->string('organisasi')->nullable();
    $table->string('pegawai')->nullable();
    $table->string('baik')->nullable();
    $table->string('sangatbaik')->nullable();
    $table->unsignedInteger('skp_id')->nullable();
    $table->timestamps();

});
    Schema::table('hasilskp', function (Blueprint $table) {
        $table->foreign('skp_id')->references('id')->on('skp')->onDelete('cascade')->onUpdate('cascade');

});




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skp');
    }
}
