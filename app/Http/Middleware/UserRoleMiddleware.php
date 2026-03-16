<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserRoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        if (!$user) {
            return redirect('/login');
        }

        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        switch ($user->role) {
            case 'student':
                return redirect('/students/dashboard');
                break;

            case 'admin':
                return redirect('/admin/dashboard');
                break;

            case 'chief':
                return redirect('/chief/dashboard');
                break;

            default:
                return redirect('/login');
        }
    }
}
