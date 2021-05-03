<?php

namespace App\Http\Controllers;

use App\Product;
use App\RotatoryImage;

use Illuminate\Http\Request;

class RotatoryImageController extends Controller
{
   public function upload_image(Product $product){

    $images=RotatoryImage::where('product_id',$product->id)->get();

    return view('products.360_index',compact('images'));
    

   }
}
