<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suratkeluar extends Model
{
    protected $table = 'suratkeluar';
    public $timestamps = true;

    public function indeks()
    {
      return $this->belongsTo('App\Models\indeks', 'indeks_id');
    }
   
}
