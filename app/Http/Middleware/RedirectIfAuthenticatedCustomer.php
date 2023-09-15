<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticatedCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the customer is authenticated
        if (Auth::guard('customer')->check()) {
            // Check if the requested route is the logout route
            if ($request->routeIs('customer.logout')) {
                // Allow access to the logout route
                return $next($request);
            }

            // Redirect authenticated customers to the home page or another appropriate route
            return redirect('/');
        }

        return $next($request);
    }
}
