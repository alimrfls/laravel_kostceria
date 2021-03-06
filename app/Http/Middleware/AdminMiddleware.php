<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
        /*Middleware untuk cek apakah role dari user adalah admin*/

        if(Auth::check()){
            $user = Auth::user();
            if($user->role != 'admin'){
                return redirect('/error-403');
            }
        }else{
            return redirect('/error-401');
        }


        return $next($request);
    }
}
