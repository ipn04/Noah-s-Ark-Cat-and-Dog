<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteAccountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->isMethod('delete') && $request->routeIs('delete.account')) {
            // Log a message for debugging
            \Log::info('DELETE request to delete.account route');
    
            return $next($request);
        }
    
        // Log a message for debugging
        \Log::info('Redirecting to / due to middleware');
    
        // Handle other cases, for example, redirect to home
        return redirect('/');
    }
}
