<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserAuth
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
        /*Middleware apakah user sudah login atau belum*/
        if(!Auth::check()){
            return redirect('/error-401');
        }

        return $next($request);
    }
}
