<?php 
namespace App\Services;
use Auth;
use App\User;
use App\Review;
use App\Product;
use Illuminate\Http\Request;
class ReviewService 
{
	public static function store($request,$id)
    {
        $product = Product::findOrFail($id);

        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $product->ratings()->save($rating);
        $review = $product->reviews()->create([
            'review'    =>$request->input('review'),
            'user_id'   => Auth::user()->id,
            'rating_id' =>$rating->id,
        ]);
        return $review;
    }
}