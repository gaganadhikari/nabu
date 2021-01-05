<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use auth;

class Admin
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
        if(!Auth::guard('admin')->check()){
            return redirect('admin');
        }
        return $next($request);
    }
}
