<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class AccessDashboard
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
        if (Auth::check() && Auth::user()->hasRole(['admin', 'editor','employe'])){
            return $next($request);
        }
        return redirect('/my-account/dashboard');
    }
}
