<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
   
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
    
        if( !session()->has('loggedUser') && ($request->path() != 'auth/register' && $request->path() != 'auth/login')){
            return redirect()->route('auth.login')->with('fail', 'You must be logged in!');
        }

        if( session()->has('loggedUser') && ( $request->path() == 'auth/register' || $request->path() == 'auth/login' ) ){
            return redirect()->intended('dashboard')->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
                                                ->header('Pragma', 'no-cache')
                                                ->header("Expires", 'Sat 01 1997 00:00:00 GMT');
        }
        
        return $next($request);
    }
}
