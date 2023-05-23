<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    protected $table = 'jabatan';
    public $timestamps = true;

    public function user(){
    	return $this->hasMany(User::class);
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
