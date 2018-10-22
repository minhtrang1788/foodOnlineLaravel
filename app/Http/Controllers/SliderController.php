<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Slider;
use Images;
class SliderController extends Controller
{
    public function showSliders(){
      $sliders = Slider::all();
      return view('admin/showSliders', compact('sliders'));
    }
    public function deleteSlider($id){
      $slider = Slider::where('id',$id)->delete();
      Session::flash('message','Delete slider success!');
      return redirect('admin/showSliders');
    }

    public function createSlider(Request $request){
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
         $img = Images::make($thumbnailpath)->resize(1180, 500);
         $img->save($thumbnailpath);

         $image = Slider::create(array('url'=>'/storage/profile_images/thumbnail/'.$filenametostore));
        }
      Session::flash('message','Add slider success!');
      return redirect('admin/showSliders');
    }
}
