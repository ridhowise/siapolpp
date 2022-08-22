<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Terbilang;

class days extends Model
{
    protected $table = 'days';
    public $timestamps = true;

    public function month()
    {
      return $this->belongsTo('App\Models\month', 'month_id');
    }

  }
