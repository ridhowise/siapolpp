<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lampiran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hasilskp', function (Blueprint $table) {
            $table->string('rating')->nullable()->after('skp_id');
        });;

        Schema::create('dukungan', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('dukungan')->nullable();
            $table->unsignedInteger('skp_id')->nullable();
            $table->timestamps();
        
        });
            Schema::table('dukungan', function (Blueprint $table) {
                $table->foreign('skp_id')->references('id')->on('skp')->onDelete('cascade')->onUpdate('cascade');
        
        });

        Schema::create('skema', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('skema')->nullable();
            $table->unsignedInteger('skp_id')->nullable();
            $table->timestamps();
        
        });
            Schema::table('skema', function (Blueprint $table) {
                $table->foreign('skp_id')->references('id')->on('skp')->onDelete('cascade')->onUpdate('cascade');
        
        });

        Schema::create('konsekuensi', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('konsekuensi')->nullable();
            $table->unsignedInteger('skp_id')->nullable();
            $table->timestamps();
        
        });
            Schema::table('konsekuensi', function (Blueprint $table) {
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
        //
    }
}
