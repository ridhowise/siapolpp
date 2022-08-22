<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tahun extends Model
{
    protected $table = 'tahun';
    public $timestamps = true;

    public function kibb()
    {
      return $this->belongsTo('App\Models\kibb', 'tahun_id');
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
