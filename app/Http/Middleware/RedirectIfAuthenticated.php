<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is already authenticated
        if (Auth::check()) {
            // Redirect authenticated users away from the login page
            return redirect('/home'); // Redirect to the home page or any other suitable page
        }

        // If the user is not authenticated, allow the request to proceed
        return $next($request);
    }
}
