<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Categories;
use Session;
use Images;
use App\Image;
use Yajra\Datatables\Datatables;
class PostController extends Controller
{
    //
    public function __construct(){
      return $this->middleware('auth')->except('');
    }
    public function  viewPost(Post $id){
        $post = $id;
        return view('blogSingle',compact('post'));
    }

    public function viewPostsCat(Categories $cat){
      $id = $cat->id;
      $posts = Post::where(array('category_id'=>$id,'is_public'=>1))->latest()->get();

      return view('blog',compact('posts'));

    }

    public function getPosts(){

       $post = Post::where('is_public',1)->latest()->get();
       return Datatables::of($post)
            ->addColumn('category', function ($post) {
                $cat = $post->Category;
                return $cat->name;
            })
            ->addColumn('action', function ($post) {
                return '<a href="/admin/editPost/'. $post->slug.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="/admin/delPost/'. $post->slug.'" class="btn btn-xs btn-primary" onclick="javascript:return confirmDel()"><i class="glyphicon glyphicon-del"></i> Delete</a>';
            })
            ->make(true);
    }

    function showPosts(){
      return view('/admin/showPosts');
    }

    public function createPost(Request $request){
      $this->validate(request(),[
        'name'=>'required|unique:posts|max:255',
        'body'=>'required',
       'category'=>'required',
        'post_image'=>'required',
      ]);
      if($request->hasFile('post_image')) {
       //get filename with extension
       $filenamewithextension = $request->file('post_image')->getClientOriginalName();

       //get filename without extension
       $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

       //get file extension
       $extension = $request->file('post_image')->getClientOriginalExtension();

       //filename to store
       $filenametostore = $filename.'_'.time().'.'.$extension;

       //Upload File
       $request->file('post_image')->storeAs('public/profile_images', $filenametostore);
       $request->file('post_image')->storeAs('public/profile_images/thumbnail', $filenametostore);

       //Resize image here
       $thumbnailpath = public_path('storage/profile_images/thumbnail/'.$filenametostore);
       $img = Images::make($thumbnailpath)->resize(350, 220);
       $img->save($thumbnailpath);

       $image = Image::create(array('url'=>'storage/profile_images/thumbnail/'.$filenametostore));
       $image_id = $image->id;
      }
      else $image_id = 1;
      $data = array(
        'name'=>request('name'),
        'body'=>request('body'),
        'category_id'=>request('category'),
        'slug'=>str_replace(' ','',request('name')),
        'user_id'=>auth()->id(),
        'is_public'=>1,
        'image_id'=>$image_id,
      );
      Post::create($data);
      Session::flash('message','Create post success!');
      return view('admin/showPosts');
    }

    public function editPost(Request $request,Post $post){
      if(request('name') != $post->name)
        $this->validate(request(),['name'=>'unique:posts']);
      $this->validate(request(),[
        'name'=>'required|max:255',
        'body'=>'required',
       'category'=>'required',
      ]);
      $image_old = $post->image;
      $image_id = $image_old->id;
      if($request->hasFile('post_image')) {
       //get filename with extension
       $filenamewithextension = $request->file('post_image')->getClientOriginalName();

       //get filename without extension
       $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

       //get file extension
       $extension = $request->file('post_image')->getClientOriginalExtension();

       //filename to store
       $filenametostore = $filename.'_'.time().'.'.$extension;

       //Upload File
       $request->file('post_image')->storeAs('public/profile_images', $filenametostore);
       $request->file('post_image')->storeAs('public/profile_images/thumbnail', $filenametostore);

       //Resize image here
       $thumbnailpath = public_path('storage/profile_images/thumbnail/'.$filenametostore);
       $img = Images::make($thumbnailpath)->resize(350, 220);
       $img->save($thumbnailpath);

       $image = Image::create(array('url'=>'storage/profile_images/thumbnail/'.$filenametostore));
       $image_id = $image->id;
      }
      $data = array(
        'name'=>request('name'),
        'body'=>request('body'),
        'category_id'=>request('category'),
        'slug'=>str_replace(' ','',request('name')),
        'user_id'=>auth()->id(),
        'is_public'=>1,
        'image_id'=>$image_id,
      );
      $post->update($data);
      Session::flash('message','Update post success!');
      return view('admin/showPosts');
    }

    public function delPost(Post $post){
      $post->update(array('is_public'=>0));
      Session::flash('message','Delete post success!');
      return view('admin/showPosts');
    }

}
