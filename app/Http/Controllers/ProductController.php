<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use Images;
use App\Image;
use Yajra\Datatables\Datatables;
class ProductController extends Controller
{
    //
    public function index(){

      $products = Product::where('isActived',1)->latest()->get();
      return view('product',compact('products'));
    }

    public function viewProduct(Product $pro){
      $product = $pro;
      return view('singleProduct',compact('product'));
    }
    public function getProducts(){
      //  $products = Product::latest()->get();
  /*  $customers = Customer::select(['id', 'first_name', 'last_name', 'email', 'created_at', 'updated_at']);
              return Datatables::of($customers)
                  ->addColumn('action', function ($customer) {
                      return '<a href="#edit-'. $customer->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                  })
                  ->editColumn('id', '{{$id}}')
                  ->removeColumn('updated_at')
                  ->setRowId('id')
                  ->setRowClass(function ($user) {
                      return $user->id % 2 == 0 ? 'alert-success' : 'alert-warning';
                  })
                  ->setRowData([
                      'id' => 'test',
                  ])
                  ->setRowAttr([
                      'color' => 'red',
                  ])
                  ->make(true);*/
    //   $Product = Product::select(['id', 'name', 'price']);
       $product = Product::where('isActived',1)->latest()->get();

        //return Datatables::of(Product::query())->make(true);
          return Datatables::of($product)
              ->addColumn('action', function ($product) {
                  return '<a href="/admin/editProduct/'. $product->slug.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="/admin/delProduct/'. $product->slug.'" class="btn btn-xs btn-primary" onclick="javascript:return confirmDel()"><i class="glyphicon glyphicon-del"></i> Delete</a>';
              })
              ->make(true);

    }
    public function showProduct(){
      return view('admin/showProduct');
    }

    public function createProduct(Request $request){
      $this->validate(request(),[
        'name'=>'required|unique:products|max:255',
        'price'=>'required|integer',
        'body'=>'required',
        'desc'=>'required|max:255',
      ]);

      if($request->hasFile('profile_image')) {
       //get filename with extension
       $filenamewithextension = $request->file('profile_image')->getClientOriginalName();

       //get filename without extension
       $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

       //get file extension
       $extension = $request->file('profile_image')->getClientOriginalExtension();

       //filename to store
       $filenametostore = $filename.'_'.time().'.'.$extension;

       //Upload File
       $request->file('profile_image')->storeAs('public/profile_images', $filenametostore);
       $request->file('profile_image')->storeAs('public/profile_images/thumbnail', $filenametostore);

       //Resize image here
       $thumbnailpath = public_path('storage/profile_images/thumbnail/'.$filenametostore);
       $img = Images::make($thumbnailpath)->resize(280, 240);
       $img->save($thumbnailpath);

       $image = Image::create(array('url'=>'storage/profile_images/thumbnail/'.$filenametostore));

      }
      if(isset($image)) $image_id = $image->id;
      else $image_id = 1;

      $data = array(
        'name'=>request('name'),
        'price'=>request('price'),
        'body'=>request('body'),
        'desc'=>request('desc'),
        'slug'=>str_replace(' ','',request('name')),
        'isActived'=>1,
        'image_id'=>$image_id,
      );
      Product::create($data);
      Session::flash('message','Create product success!');
      return view('admin/showProduct');
    }

    public function editProduct(Request $request,Product $product){
      if(request('name') != $product->name)
        $this->validate(request(),['name'=>'unique:products']);
      $this->validate(request(),[
        'name'=>'required|max:255',
        'price'=>'required|integer',
        'body'=>'required',
        'desc'=>'required|max:255',
      ]);

      if($request->hasFile('profile_image')) {
       //get filename with extension
       $filenamewithextension = $request->file('profile_image')->getClientOriginalName();

       //get filename without extension
       $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

       //get file extension
       $extension = $request->file('profile_image')->getClientOriginalExtension();

       //filename to store
       $filenametostore = $filename.'_'.time().'.'.$extension;

       //Upload File
       $request->file('profile_image')->storeAs('public/profile_images', $filenametostore);
       $request->file('profile_image')->storeAs('public/profile_images/thumbnail', $filenametostore);

       //Resize image here
       $thumbnailpath = public_path('storage/profile_images/thumbnail/'.$filenametostore);
       $img = Images::make($thumbnailpath)->resize(280, 240);
       $img->save($thumbnailpath);

       $image = Image::create(array('url'=>'storage/profile_images/thumbnail/'.$filenametostore));

      }
      $imageOld = $product->image;
      $id = $imageOld->id;
      if(isset($image)) $image_id = $image->id;
      else  $image_id = $id;
      $data = array(
        'name'=>request('name'),
        'price'=>request('price'),
        'body'=>request('body'),
        'desc'=>request('desc'),
        'slug'=>str_replace(' ','',request('name')),
        'isActived'=>1,
        'image_id'=>$image_id,
      );
      $product->update($data);
      Session::flash('message','Edit product success!');
      return view('admin/showProduct');
    }

    public function delProduct(Product $product){
      $image = Image::where('id',$product->image_id)->first();
      //$image->delete();
      $product->update(array('isActived'=>0));

      Session::flash('message','Delete product success!');
      return view('admin/showProduct');
    }
    
}
