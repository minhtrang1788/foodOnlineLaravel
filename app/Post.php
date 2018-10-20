<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Post extends Model
{
    //
    static public function getNewPost(){
      return static::where('is_public',1)->latest()->take(3)->get();
    }

    public function Comment(){
      return $this->hasMany('App\Comment')->latest();
    }

    public function Image(){
      return $this->belongsTo('App\Image');
    }
    public function Category(){
      return $this->belongsTo('App\Categories');
    }
    public function User(){
      return $this->belongsTo('App\User');
    }

    public function getRouteKeyName(){
      return 'slug';
    }
    protected $fillable = [
        'name', 'body', 'user_id','image_id','category_id','slug','is_public'
    ];
}
