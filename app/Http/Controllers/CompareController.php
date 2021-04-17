<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
new \Illuminate\Database\Eloquent\Collection;

class CompareController extends Controller
{
    public function index()
    {
    	$ids = session()->get('compares');
    	$products = collect();
    	if ($ids > 0) {
    		$products = Product::whereIn('id',$ids)->get();
      	}
        return view('pages.compare',compact('products'));
    }
    public function add_to_compare(Request $request)
    {
    	$product = Product::where('slug','=',$request->input('product'))->firstOrFail();
    	$compares = collect(session()->get('compares'));
        
        if ($compares->count() == 2) {
            $notify = [
                'message_type'  =>  'error',
                'message'       =>  'Your Compare list is full!'
            ];
        }else if($compares->contains($product->id)){
             $notify = [
                'message_type'  =>  'danger',
                'message'       =>  'This Product is already in your Compare list!'
            ];
        }else{
            session()->push('compares',$product->id);
            $notify = [
                'message_type'  =>  'success',
                'message'       =>  '<a href="/'.$product->slug.'">'.ucwords($product->name).'</a> has been added to compare list!'
            ];
        }
        return response()->json($notify);
    }
    public function remove_item($slug)
    {
    	$product = Product::where('slug','=',$slug)->firstOrFail();
    	$compares = session()->pull('compares');
    	
		if(($key = array_search($product->id, $compares)) !== false) {
		    unset($compares[$key]);
		}

		session()->put('compares', $compares);

    	return redirect()->back()->with('success','Product has been removed from compare list!');
    }
}