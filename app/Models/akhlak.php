<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akhlak extends Model
{
    protected $table = 'akhlak';
    public $timestamps = true;

    public function ekspetasi(){
    	return $this->hasMany(ekspetasi::class);
    }
   
    // public function soal(){
    // 	return $this->hasMany(soal::class,'soal_id');
    // }
    // public function nilai(){
    // 	return $this->hasMany(nilai::class,'persediaan_id');
    // }
    // public function jawaban(){
    // 	return $this->hasMany(jawaban::class,'persediaan_id');
    // }
}
