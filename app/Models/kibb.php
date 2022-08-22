<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kibb extends Model
{
    protected $table = 'kibb';
    public $timestamps = true;

    public function tahun()
    {
      return $this->belongsTo('App\Models\tahun', 'tahun_id');
    }
    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }
   
}
