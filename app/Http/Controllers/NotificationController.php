<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notifications()
    {
    	Auth::user()->unreadNotifications->markAsRead();
        $view = view("partials.notifications")->render();
        return response()->json(['html'=>$view]);
    }
    public function unread_notification_count()
    {
    	return Auth::user()->unreadNotifications->count();
    }
}
