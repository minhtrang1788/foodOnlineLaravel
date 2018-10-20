<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
  public function Products(){
      return $this->belongsToMany('App\Product');
  }

  static public function getTags(){
    return static::all();
  }

  public function getRouteKeyName(){
    return 'name';
  }
}
