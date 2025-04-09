<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
        // Check if the user is logged in and if the user has an admin role (assuming role=1 for admin)
        if (auth()->check() && auth()->user()->role != 1) {
            return redirect('/home')->with('error', 'You are not authorized to access the admin panel.');
        }

        return $next($request);
    }
}
