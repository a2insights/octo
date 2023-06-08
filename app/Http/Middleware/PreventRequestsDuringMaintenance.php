<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\MaintenanceModeBypassCookie;
use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];

    /**
     * Redirect the user back to the root of the application with a maintenance mode bypass cookie.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function bypassResponse(string $secret)
    {
        return redirect()->back()->withCookie(
            MaintenanceModeBypassCookie::create($secret)
        );
    }
}
