<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class month extends Model
{
    protected $table = 'month';
    public $timestamps = true;

    public function days()
    {
      return $this->hasMany('App\Models\days', 'month_id');
    }
    public function disiplin()
    {
      return $this->hasMany('App\Models\disiplin', 'month_id');
    }
    public function produktifitas()
    {
      return $this->hasMany('App\Models\disiplin', 'month_id');
    }
   
}
