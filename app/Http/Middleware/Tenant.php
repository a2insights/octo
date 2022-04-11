<?php

namespace App\Http\Middleware;

use Closure;

class Tenant
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param string|null              $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $tenant = $request->user()->tenant;

        tenancy()->initialize($tenant);

        return $next($request);
    }
}

