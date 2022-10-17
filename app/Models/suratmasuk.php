<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suratmasuk extends Model
{
    protected $table = 'suratmasuk';
    public $timestamps = true;

    public function indeks()
    {
      return $this->belongsTo('App\Models\indeks', 'indeks_id');
    }
   
}
