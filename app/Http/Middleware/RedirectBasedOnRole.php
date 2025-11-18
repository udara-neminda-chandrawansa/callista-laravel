<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectBasedOnRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $user = auth()->user();
            
            // If user is admin and trying to access regular dashboard, redirect to admin dashboard
            if ($user->role === 'admin' && $request->routeIs('dashboard')) {
                return redirect()->route('admin.dashboard');
            }
            
            // If user is regular user and trying to access admin dashboard, redirect to user dashboard
            if ($user->role === 'user' && $request->routeIs('admin.dashboard')) {
                return redirect()->route('dashboard');
            }
        }
        
        return $next($request);
    }
}
