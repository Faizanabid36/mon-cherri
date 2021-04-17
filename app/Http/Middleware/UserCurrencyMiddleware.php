<?php

namespace App\Http\Middleware;

use Closure;

class UserCurrencyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
      // if (request()->get('currency'))
      // {
      //       session()->put([
      //         'currency' => request()->get('currency'),
      //       ]);
      // }
      return $next($request);
    }
}
