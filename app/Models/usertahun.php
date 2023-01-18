<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usertahun extends Model
{
    protected $table = 'usertahun';
    public $timestamps = true;

    public function usertahun()
    {
      return $this->hasMany('App\Models\User', 'user_id');
    }
   
}