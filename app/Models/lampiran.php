<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lampiran extends Model
{
    protected $table = 'file';
    public $timestamps = true;

    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }
   
}
