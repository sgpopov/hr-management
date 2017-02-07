<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class HasAccessRights
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Admin are GODs
        if ($request->user()->hasRole('admin')) {
            return $next($request);
        }

        $method = implode('|', $request->route()->methods());
        $uri = $request->route()->uri();

        $hasAccess = $request->user()->hasAccessToRoute($method, $uri);

        if ($hasAccess !== true) {
            abort(403, 'You do not have sufficient permissions to access page.');
        }

        return $next($request);
    }
}
