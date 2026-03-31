<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use ReflectionMethod;

class LogUserActivity
{
    /**
     * Cache methods that already call log_user_activity to avoid duplicate entries.
     *
     * @var array<string, bool>
     */
    protected static array $manualLogCache = [];

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

        if (!$route) {
            return $response;
        }

        $controllerAction = $route->getActionName();
        if (isset(self::$manualLogCache[$controllerAction]) && self::$manualLogCache[$controllerAction] === true) {
            return $response;
        }

        if (!isset(self::$manualLogCache[$controllerAction])) {
            self::$manualLogCache[$controllerAction] = $this->methodHasManualLog($controllerAction);
            if (self::$manualLogCache[$controllerAction] === true) {
                return $response;
            }
        }

        $action = $route->getActionMethod() ?? strtolower($request->method());
        $module = $this->resolveModule($route->getName(), $controllerAction, $request);
        $description = 'User accessed ' . ($route->uri() ?? $request->path());
        $subjectId = $this->resolveSubjectId($route->parameters());

        log_user_activity(
            $subjectId,
            $module,
            $action,
            $description,
            url()->current()
        );

        return $response;
    }

    /**
     * Detect if the target controller method already logs manually.
     */
    protected function methodHasManualLog(string $controllerAction): bool
    {
        if (!str_contains($controllerAction, '@')) {
            return false;
        }

        [$class, $method] = explode('@', $controllerAction);

        if (!class_exists($class) || !method_exists($class, $method)) {
            return false;
        }

        try {
            $reflectionMethod = new ReflectionMethod($class, $method);
            $file = $reflectionMethod->getFileName();
            $start = $reflectionMethod->getStartLine();
            $end = $reflectionMethod->getEndLine();

            if (!$file || !$start || !$end) {
                return false;
            }

            $lines = file($file);
            if ($lines === false) {
                return false;
            }

            $methodBody = implode('', array_slice($lines, $start - 1, $end - $start + 1));

            return Str::contains($methodBody, 'log_user_activity(');
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Build a stable model table/module name for activity logs.
     */
    protected function resolveModule(?string $routeName, string $controllerAction, Request $request): string
    {
        if (!empty($routeName)) {
            $parts = explode('.', $routeName);
            if (!empty($parts[0])) {
                return $parts[0];
            }
        }

        if (str_contains($controllerAction, '@')) {
            [$class] = explode('@', $controllerAction);
            $base = class_basename($class);
            $base = Str::replaceLast('Controller', '', $base);

            return Str::snake($base);
        }

        return trim(explode('/', $request->path())[0] ?? 'web');
    }

    /**
     * Best-effort subject id extraction from route model bindings.
     */
    protected function resolveSubjectId(array $routeParameters): int
    {
        foreach ($routeParameters as $parameter) {
            if (is_object($parameter) && isset($parameter->id) && is_numeric($parameter->id)) {
                return (int) $parameter->id;
            }

            if (is_numeric($parameter)) {
                return (int) $parameter;
            }
        }

        return 0;
    }
}
