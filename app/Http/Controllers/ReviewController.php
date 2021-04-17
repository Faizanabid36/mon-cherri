<?php

namespace App\Http\Controllers;

use App\User;
use App\Review;
use App\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\BulkDeleteItemRequest;
use App\Notifications\MailNotification;


class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view.reviews',['only' => ['index']]);
        $this->middleware('permission:edit.reviews',['only' => ['edit']]);
        $this->middleware('permission:delete.reviews',['only' => ['destroy']]);
        $this->middleware('permission:view.deleted.reviews',['only' => ['get_deleted_reviews']]);
        $this->middleware('permission:restore.deleted.reviews',['only' => ['restore_all','restore_single']]);
        $this->middleware('permission:delete.forever.reviews',['only' => ['force_delete_single','force_delete_all']]);
    }
    public function index()
    {
        Review::where('is_viewed', 0)->update(['is_viewed' => 1]);
        $reviews = Review::latest()->get();
        return view('reviews.index',compact('reviews'));
    }
    public function store(Request $request)
    {
        
    }

    public function edit(Review $review)
    {
        $review = Review::findOrFail($review->id);
        $view = view("reviews.edit",compact('review'))->render();

        return response()->json(['html'=>$view]);
    }

    public function update(Request $request, Review $review)
    {
         $review = Review::findOrFail($review->id);
         $review->review = $request->input('review');
         $review->save();
         return redirect()->route('reviews.index')->with('success','Review has been updated');
    }

    public function destroy(Review $review)
    {
        Review::find($review->id)->delete();
        return redirect()->route('reviews.index')->with('success','Review has been deleted');    
    }
    public function allow_disallow($id)
    {
        $review = Review::findOrFail($id);
        if ($review->status == false) {
            $review->status = true;
            $msg = 'Review has been allowed on front page';
        }else{
            $review->status = false;
            $msg = 'Review has been disallowed';
        }
        $review->save();
        return redirect()->route('reviews.index')->with('success',$msg);
    }
    public function bulk_delete(BulkDeleteItemRequest $request)
    {  
        $reviews = explode(',',$request->items);
        Review::destroy($reviews);
        return redirect()->route('reviews.index')->with('success','Reviews have been deleted');
    }

    public function get_deleted_reviews()
    {
        $deleted_reviews = Review::onlyTrashed()->get();
        return view('reviews.deleted',compact('deleted_reviews'));
    }
    public function restore_single($id)
    {
        Review::where('id',$id)->restore();
        return redirect()->route('reviews.deleted')->with('success','Review have been restored');
    }
    public function restore_all()
    {
        Review::onlyTrashed()->restore();
        return redirect()->route('reviews.deleted')->with('success','Reviews have been restored');
    }
    public function force_delete_single(Request $request, $id)
    {
        Review::where('id',$id)->forceDelete();
        return redirect()->route('reviews.deleted')->with('success','Review have been deleted forever!');
    }
    public function force_delete_all(Request $request)
    {
        Review::onlyTrashed()->forceDelete();
        return redirect()->route('reviews.deleted')->with('success','Reviews have been deleted forever!');
    }
}
