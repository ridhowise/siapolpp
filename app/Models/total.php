<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Terbilang;

class total extends Model
{
    protected $table = 'total';
    public $timestamps = true;

    public function month()
    {
      return $this->belongsTo('App\Models\month', 'month_id');
    }
    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }
   
  }
