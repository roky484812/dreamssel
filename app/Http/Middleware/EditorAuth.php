<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EditorAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth()->user() ){
            if(Auth()->user()->role == 2){
                if(Auth()->user()->is_active == 0){
                    Auth()->logout();
                    return redirect('/login')->with('error', 'You are not an active user. Please contact to dreamssel.');
                }
                return $next($request);
            }
        }
        return redirect('/login');
    }
}
