<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SystemDashboard
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
        if (!Auth::user()->super_admin || Auth::user()->dashboard != 'system') {
            return redirect('dashboard');
        }

        return $next($request);
    }
}
