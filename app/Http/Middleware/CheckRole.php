<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // dd($role);
        // dd(Auth::user());
        if(Auth::check() && Auth::user()->role == $role){
            return $next($request);
        }
        return redirect(route('login.index'))->withErrors('You don\'t have permission');
    }
}
