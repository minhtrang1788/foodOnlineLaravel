<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    static public function addToCart($product_id){

    }
    public function User(){
      return $this->belongsTo('App\User');
    }

    public function Product(){
      return $this->belongsTo('App\Product');
    }
    protected $fillable = array('product_id', 'user_id','quantity','status');
}
