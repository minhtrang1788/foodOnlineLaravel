<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
class TagController extends Controller
{
    //
    public function viewTagProduct(Tag $tag){
        $products = $tag->Products;
        return view('product',compact('products'));
    }
}
