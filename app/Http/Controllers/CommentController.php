<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Session;
class CommentController extends Controller
{

    public function __construct(){
      $this->middleware('auth')->except('');
    }
    public function comment(){
      $this->validate(request(),[
        'body'=>'required'
        ]);
      Comment::create([
        'user_id'=>request('user_id'),
        'post_id'=>request('post_id'),
        'body'=>request('body'),
      ]);
      Session::flash('message', "Comment success!");
      return redirect()->back();

    }
}
