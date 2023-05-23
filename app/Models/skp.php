<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skp extends Model
{
    protected $table = 'skp';
    public $timestamps = true;
    
    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }
   
}
