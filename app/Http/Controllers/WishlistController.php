<?php

namespace App\Http\Controllers;

use Auth;
use App\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
    	$products = Auth::user()->wishlist;
    	return view('pages.wishlist', compact('products'));
    }
    public function add_to_wishlist(Request $request)
    {
    	$product = Product::where('slug','=',$request->input('product'))->firstOrFail();

    	if (!Auth::user()->wishlist()->wherePivot('product_id', $product->id)->exists()) {
    		Auth::user()->wishlist()->attach($product->id);
    		$notify = [
                'message_type'  =>  'success',
                'message'       =>  '<a href="/'.$product->slug.'">'.ucwords($product->name).'</a> has been added to Wishlist!'
            ];
    	}else{
    		$notify = [
                'message_type'  =>  'danger',
                'message'       =>  'This Product is already in your Wishlist!'
            ];
    	}
    	return response()->json($notify);
    }
    public function remove_item($slug)
    {
    	$product = Product::where('slug','=',$slug)->firstOrFail();

    	Auth::user()->wishlist()->detach($product->id);

    	return redirect()->back()->with('success','Product has been removed from Wishlist!');
    }
}
