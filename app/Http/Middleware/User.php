<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth()->user()!==null){
            if(Auth()->user()->role=='user')
            {
                return $next($request);
            } 
            else 
            {
                abort(401);
            }
        } else {
            abort(401);
        }
        return $next($request);
    }
}
