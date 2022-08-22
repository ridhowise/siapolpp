<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Terbilang;

class finger extends Model
{
    protected $table = 'finger';
    public $timestamps = true;

    public function disiplin()
    {
      return $this->belongsTo('App\Models\disiplin', 'disiplin_id');
    }
    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }
  }
