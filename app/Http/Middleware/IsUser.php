<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(empty(auth()->user()->id)){
            return redirect()->intended('/');
        }
        else if(auth()->user()->id == 1){
            return redirect()->intended('/');
        }
        else if(auth()->user()->id > 1){
            return $next($request);
        }
    }
}
