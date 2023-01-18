<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usertahun extends Model
{
    protected $table = 'usertahun';
    public $timestamps = true;

    public function user()
    {
      return $this->BelongsTo('App\Models\User', 'user_id');
    }

    public function tahunan()
    {
      return $this->BelongsTo('App\Models\tahunan', 'tahun_id');
    }
   
}