<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Terbilang;

class disiplin extends Model
{
    protected $table = 'disiplin';
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
