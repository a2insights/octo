<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
    public function handle(Request $request, Closure $next)
    {
        if($this->checkRoute($request)) {
            $tenant = $request->user()->tenant;

            tenancy()->initialize($tenant);
        }

        return $next($request);
    }

    /**
     * Check if the current route is a tenant route.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    private function checkRoute(Request $request)
    {
        $routeName = $request->route()->getName();

        $requestParameters = $request->route()->parameters();

        if (Str::contains($routeName, 'filament')) {
            return true;
        }

        if(Str::contains(@$requestParameters['name'], 'filament')) {
            return true;
        }

        return false;
    }
}

