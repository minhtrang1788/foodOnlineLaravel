<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class listPartner extends Model
{
    protected $fillable = ['url'];

    static public function getPartners(){
      return static::latest()->get();
    }
}
