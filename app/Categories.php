<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    static public function getAllCategories(){
      return static::all();
    }

    public function getRouteKeyName(){
      return 'name';
    }

}
