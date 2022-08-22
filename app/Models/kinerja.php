<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Terbilang;

class kinerja extends Model
{
    protected $table = 'kinerja';
    public $timestamps = true;

    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function month()
    {
      return $this->belongsTo('App\Models\month', 'month_id');
    }
    public function produktifitas()
    {
      return $this->belongsTo('App\Models\produktifitas', 'produktifitas_id');
    }

  }
