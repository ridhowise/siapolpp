<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ekspetasi extends Model
{
    protected $table = 'ekspetasi';
    public $timestamps = true;
    
    public function akhlak()
    {
      return $this->belongsTo('App\Models\akhlak', 'akhlak_id');
    }

    
    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }
   
   
}
