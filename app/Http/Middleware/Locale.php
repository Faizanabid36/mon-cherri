<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->has('lang')) {

            $locale = $request->lang;

           if (in_array($locale, ['en', 'ar'])){

                Session::put('mylang', $locale);
            }
        }

        if (Session::has('mylang')) {
            App::setLocale(Session::get('mylang'));
        }else{
            $locale = 'en';
            App::setLocale($locale);
        }

        return $next($request);
    }
}
