<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // If the user is not an admin, redirect to home
        if (Auth::check() && Auth::user()->email != 'admin@bryanportofolio.com') {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
