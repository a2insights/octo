<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {
        $path = explode('/', $request->path());

        if(!Auth::user())
          return redirect()->route('login');

        if (tenant('id') !== Auth::user()->tenant_id) {

            $path[0] = Auth::user()->tenant_id;

            return redirect(implode('/', $path));
        }

        return $next($request);
    }
}
