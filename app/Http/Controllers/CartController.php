<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Yajra\Datatables\Datatables;
use Session;
class CartController extends Controller
{
    //
    public function __construct(){
      $this->middleware('auth')->except('');
    }
    public function addToCart(){

    $product = Product::Where(['slug'=>request('product_slug')])->first();

     $cart = Cart::where(['product_id'=>$product->id,'user_id'=>auth()->id()])->first();

      if(count($cart)){
        $quantity = $cart->quantity + 1 ;
        $cart->update(['quantity'=>$quantity]);
      } else {
        Cart::create(['product_id'=>$product->id,'user_id'=>auth()->id(),'quantity'=>1,'status'=>0]);
      }

      return response()->json(['message'=>'Product added to cart!']);

    }

    public function viewCart(){
      $orders = Cart::where(['user_id'=>auth()->id(),'status'=>0])->get();
      return view('cart',compact('orders'));
    }

    public function addProduct(){
     $order = Cart::where(['id'=>request('order_id')])->first();
     $quantity = $order->quantity + 1;
     $order->update(['quantity'=> $quantity]);
     return response()->json(['success'=>'Got Simple Ajax Request.','quantity'=>$quantity]);
   }

   public function subProduct(){
    $order = Cart::where(['id'=>request('order_id')])->first();
    $quantity = $order->quantity - 1;
    if($quantity == 0)
      $order->delete();
    else
      $order->update(['quantity'=> $quantity]);
    return response()->json(['success'=>'Got Simple Ajax Request.','quantity'=>$quantity]);
  }

  public function delProductCart(){
    $order = Cart::where(['id'=>request('order_id')])->first();
    $order->delete();
    return response()->json(['message'=>'Remove order success!']);
  }
  public function showOrders($status){
    return view('admin/showOrders',compact('status'));

  }
  public function getOrders($status){
    $orders = Cart::where('status',$status)->get();

    return Datatables::of($orders)
        ->addColumn('user', function ($orders) {
            $user = $orders->user;
            return $user->name;
        })
        ->addColumn('product', function ($orders) {
            $product = $orders->Product;
            return $product->name;
        })
        ->addColumn('action', function ($orders) {
          $action ='';
          if($orders->status == 0)  $action ='check out';
          if($orders->status == 1)  $action ='Prepare';
          if($orders->status == 2)  $action ='Shipping';
          if($orders->status == 3)  $action ='Finished';
            return '<a href="/admin/actionOrder/'. $orders->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>'.$action.'</a>';
        })
        ->make(true);
  }

  public function checkout(){
    Cart::where(['user_id'=>auth()->id(),'status'=>0])
            ->update(['status'=>1]);
    Session::flash('message','Check out success!');
    return redirect('/');
  }
  public function actionOrder(Cart $order){
      $order->update(['status'=>($order->status + 1)]);
      Session::flash('message','Change state success!');
      return back();

  }
}
