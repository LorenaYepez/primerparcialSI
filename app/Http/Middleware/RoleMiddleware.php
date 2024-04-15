<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // if ($request->user()->role === $role ) { 
        //     return redirect()->route('admin/dashboard');
        // }
        // return $next($request);
        if ($request->user()->role === $role) {
            // Authorized user, let them access the route
            return $next($request);
        }
        // Unauthorized user, redirect to a specific route (e.g., login)
        return redirect()->route('admin/dashboard'); // Replace with your desired route
    


    }
}
