<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tahunan extends Model
{
    protected $table = 'tahunan';
    public $timestamps = true;

   
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
