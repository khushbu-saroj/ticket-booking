<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Authenticated
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
        if (!Auth::check()) {
            //dd('User not authenticated'); // Debugging point
            return redirect()->back();
        }
    
       // dd(Auth::user()); // Debugging the authenticated user
        return $next($request);
     
    }
}
