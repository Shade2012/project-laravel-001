<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the requested URL is the login page
        if ($request->is('login/index')) {
            // If the user is already authenticated, redirect them to the home page
            if (Auth::check()) {
                return redirect('/home');
            }
        } elseif ($request->is('dashboard/*')) {
            // If the user is accessing dashboard routes and is not authenticated, redirect them to the login page
            if (!Auth::check()) {
                return redirect('/login/index');
            }
        }

        return $next($request);
    }
}
