<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Socialite;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SocialAuthGoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
               
        $googleUser = Socialite::driver('google')->user();
        $existUser = User::where('email',$googleUser->email)->first();
        

        if($existUser) {
            Auth::loginUsingId($existUser->id);
        }else{
            $user = User::create([
                'name'          =>  $googleUser->getName(),
                'slug'          =>  Str::slug($googleUser->getName()),
                'email'         =>  $googleUser->getEmail(),
                'password'      =>  Hash::make('password'),
                'google_id'     =>  $googleUser->getId(),
            ]);
            $role = config('roles.models.role')::where('name', '=', 'customer')->first();
            $user->attachRole($role);
            $user->info()->create([]);

            Auth::loginUsingId($user->id);
        }

        $url   = session('after_login_url') ? session('after_login_url') : '/my-account/dashboard' ;
        return redirect($url);
    }
}
