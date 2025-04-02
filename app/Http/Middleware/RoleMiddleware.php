<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            return redirect('/login'); // Redirect if not logged in
        }

        if (Auth::user()->role !== $role) {
            abort(403, 'Unauthorized Access'); // Show error if role doesn't match
        }

        return $next($request);
    }
}
