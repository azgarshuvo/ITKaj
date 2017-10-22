<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ProfileComplete
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
        if ( Auth::check() && Auth::user()->is_complete == 1 )
        {
            return $next($request);
        }

        return redirect()->route('profileSettings')->with('message', 'Please complete your profile');;
    }
}
