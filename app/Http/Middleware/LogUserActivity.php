<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LogUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (!auth()->check()) {
            return $response;
        }

        if ($request->is('assets/*') || $request->is('build/*') || $request->is('storage/*')) {
            return $response;
        }

        $route = $request->route();
        $routeName = $route?->getName() ?? 'web';
        $action = $route?->getActionMethod() ?? strtolower($request->method());
        $module = explode('.', $routeName)[0] ?: trim(explode('/', $request->path())[0] ?? 'web');
        $description = 'User accessed ' . ($route?->uri() ?? $request->path());

        log_user_activity(
            0,
            $module,
            $action,
            $description,
            url()->current()
        );

        return $response;
    }
}
