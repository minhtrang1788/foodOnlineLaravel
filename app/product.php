<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    static public function getLastestFood(){
      return static::where('isActived',1)->latest()->take('4')->get();
    }

    static public function getHomeLastestFood(){
      return static::where('isActived',1)->latest()->take('8')->get();
    }

    public function Image(){
      return $this->belongsTo('App\Image');
    }

    public function getRouteKeyName(){
      return 'slug';
    }

    public function Tags(){
        return $this->belongsToMany('App\Tag');
    }
    protected $fillable = ['name','price','body','desc','isActived','slug','image_id'];
}
