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

class SocialAuthFacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function callback()
    {
        $fbuser = Socialite::driver('facebook')->user();          
        
        $existUser = User::where('email',$fbuser->getEmail())->first();
            
        if($existUser) {
            Auth::loginUsingId($existUser->id);
        }else{
            $user = User::create([
                'name'          =>  $fbuser->getName(),
                'slug'          =>  Str::slug($fbuser->getName()),
                'email'         =>  $fbuser->getEmail(),
                'password'      =>  Hash::make('password'),
                'facebook_id'   =>  $fbuser->getId(),
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
