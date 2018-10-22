<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\ListPartner;
use Images;

class ListPartnerController extends Controller
{

  public function __construct(){
    return $this->middleware('auth')->except('');
  }

  public function showPartners(){
    $partners = ListPartner::all();
    return view('admin/showPartners', compact('partners'));
  }
  public function deletePartner($id){
    $partner = ListPartner::where('id',$id)->delete();
    Session::flash('message','Delete partner success!');
    return redirect('admin/showPartners');
  }

  public function createPartner(Request $request){
    $this->validate(request(),['image'=>'required']);

    if($request->hasFile('image')) {
     //get filename with extension
       $filenamewithextension = $request->file('image')->getClientOriginalName();

       //get filename without extension
       $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

       //get file extension
       $extension = $request->file('image')->getClientOriginalExtension();

       //filename to store
       $filenametostore = $filename.'_'.time().'.'.$extension;

       //Upload File
       $request->file('image')->storeAs('public/profile_images', $filenametostore);
       $request->file('image')->storeAs('public/profile_images/thumbnail', $filenametostore);

       //Resize image here
       $thumbnailpath = public_path('storage/profile_images/thumbnail/'.$filenametostore);
       $img = Images::make($thumbnailpath)->resize(200, 80);
       $img->save($thumbnailpath);

       $image = ListPartner::create(array('url'=>'/storage/profile_images/thumbnail/'.$filenametostore));
      }
    Session::flash('message','Add parner success!');
    return redirect('admin/showPartners');
  }
}
