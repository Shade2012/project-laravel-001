<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the requested URL is '/dashboard/student/all' or '/dashboard/kelas/all'
        if ($request->is('dashboard/student/all') || $request->is('dashboard/kelas/all')) {
            // If the user is not authenticated, redirect them to the login page
            if (!Auth::check()) {
                return redirect('/login/index');
            }
        }

        return $next($request);
    }
}
