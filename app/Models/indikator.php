<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class indikator extends Model
{
    protected $table = 'indikator';
    public $timestamps = true;
    
    public function rencana()
    {
      return $this->belongsTo('App\Models\rencana', 'rencana_id');
    }
   
}
