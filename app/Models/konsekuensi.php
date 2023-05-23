<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konsekuensi extends Model
{
    protected $table = 'konsekuensi';
    public $timestamps = true;
    
   

    public function skp()
    {
      return $this->belongsTo('App\Models\skp', 'skp_id');
    }
    
   
}
