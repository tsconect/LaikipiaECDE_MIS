<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;

class CheckPermissions
{
    public function handle($request, Closure $next, ...$permissions)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // Redirect or handle unauthorized users as per your application logic
            // For example: return redirect()->route('login');
        }

        // Check if the user has any of the required permissions
        if (!Auth::user()->hasAnyPermission($permissions)) {
            throw UnauthorizedException::forPermissions($permissions);
        }

        return $next($request);
    }
}
