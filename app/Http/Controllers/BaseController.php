<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Cart;
use App\User;
use App\State;
use App\Country;
use App\Contact;

use App\Services\OrderService;
use App\Services\ReviewService;
use App\Services\CommentService;

use App\Notifications\OrderNotification;
use App\Notifications\ReviewNotification;
use App\Notifications\ContactNotification;
use App\Notifications\CommentNotification;
use Illuminate\Support\Facades\Notification;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\EditProfileRequest;

class BaseController extends Controller
{
    public function update_account(EditProfileRequest $request, $id)
    {
        Auth::user()->info()->update($request->except('_token','_method','name'));
        Auth::user()->update(['name'=>$request->input('name')]);
        if (Cart::count() > 0) {
            return redirect('/checkout');
        }
        return back()->with('success','Account has been updated');
    }

    public function order_store(OrderRequest $request)
    {
        $invoice_no = OrderService::generate_invoice_no();
        $invoice    = OrderService::order($request,$invoice_no);


        // ** send notification to admin **


        $users = User::whereHas('roles', function($q){
            $q->where('slug', 'admin')->orWhere('slug', 'editor');
        })->get();
        Notification::send($users, new OrderNotification($invoice));

        

        return redirect('/my-account/orders')->with('success','Your order has been submit');
    }

    public function contact_store(ContactRequest $request)
    {
        Contact::create($request->except('_token'));
        $users = User::whereHas('roles', function($q){
            $q->where('slug', 'admin')->orWhere('slug', 'editor');
        })->get();
        Notification::send($users, new ContactNotification($request));
        return redirect('/contact')->with('success','Thank you for your contact , we will contact you back ASAP!');
    }

    public function review_store(ReviewRequest $request,$id)
    {
        $review = ReviewService::store($request,$id);
        $users = User::whereHas('roles', function($q){
            $q->where('slug', 'admin')->orWhere('slug', 'editor', 'employe');
        })->get();
        Notification::send($users, new ReviewNotification($review));
        return redirect('/'.$review->product->slug)->with('success','Review has been submited');
    }

    public function comment_store(CommentRequest $request,$id)
    {
        $comment = CommentService::store($request,$id);
        $users = User::whereHas('roles', function($q){
            $q->where('slug', 'admin')->orWhere('slug', 'editor', 'employe');
        })->get();
        Notification::send($users, new CommentNotification($comment));
        return redirect('/post/'.$comment->commentable->slug)->with('success','Comment has been submited');
    }

    public function change_pswd(PasswordRequest $request)
    {
        if (!(Hash::check($request->input('current_password'), Auth::user()->password))) {
            return back()->withInput()->with('danger', 'Current password is wrong');
        }
       Auth::user()->fill(['password' => Hash::make($request->input('password'))])->save();
        return back()->with('success', 'Password has been changed');
    }
    public function country_states(Request $request)
    {
        $country = Country::findOrFail($request->input('country'));
        $view = view('partials.country_states',compact('country'))->render();
        return response()->json(['html'=>$view]);
    }
    public function state_cities(Request $request)
    {
        $state = State::findOrFail($request->input('state'));
        $view = view('partials.state_cities',compact('state'))->render();
        return response()->json(['html'=>$view]);
    }
}