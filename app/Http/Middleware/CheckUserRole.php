<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Api\v1\BaseController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            return (new BaseController)->respondWithError([], 'Unauthorized. Please log in.', 401);
        }

        $user = Auth::user();

        // Allow multiple roles: e.g., 'Admin|Editor'
        if (!$user->hasAnyRole(explode('|', $role))) {
            return (new BaseController)->respondUnauthorized(['Unauthorized access.'], false, 'Unauthorized access.');
        }

        return $next($request);
    }
}
