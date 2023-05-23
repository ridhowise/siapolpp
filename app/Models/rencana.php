<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rencana extends Model
{
    protected $table = 'rencana';
    public $timestamps = true;
    
    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function skp()
    {
      return $this->belongsTo('App\Models\skp', 'skp_id');
    }
    
    public function indikator(){
    	return $this->hasMany('App\Models\indikator', 'rencana_id');
    }

}
