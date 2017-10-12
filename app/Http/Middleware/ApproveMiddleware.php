<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ApproveMiddleware
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
        if ( Auth::check() && Auth::user()->verified == 1 )
        {
            return $next($request);
        }

        return redirect()->route('verifyEmail')->with('message', 'A confirmation email has been send to your email address');
    }
}
