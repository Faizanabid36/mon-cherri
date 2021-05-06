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
    public function update_image( Request $request,$id){
      
      $imageOr=RotatoryImage::find($id);
      $image = $request->file('path');
      $name = time().'.'.$image->getClientOriginalExtension();
      $destinationPath = public_path('/images/360/');
      $image->move($destinationPath, $name);
      $imageOr->path=asset('images/360/'.$name);
      $imageOr->save();
      return back()->with('success','images updated');
    }
    

   }

