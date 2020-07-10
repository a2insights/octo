<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {
        if(!Auth::user())
          return redirect()->route('login');

        $tenant = Tenant::find(Auth::user()->tenant_id);

        tenancy()->initialize($tenant);

        return $next($request);
    }
}
