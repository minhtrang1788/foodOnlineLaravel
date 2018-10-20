<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    //
    protected $fillable = ['url'];

    static public function getSliders(){
      return static::latest()->take(3)->get();
    }
}
