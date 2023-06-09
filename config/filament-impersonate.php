<?php

// config for xlite-dev/filament-impersonate
return [

    // This is the guard used when logging in as the impersonated user.
    'guard' => env('FILAMENT_IMPERSONATE_GUARD', 'web'),

    // After impersonating this is where we'll redirect you to.
    'redirect_to' => env('FILAMENT_IMPERSONATE_REDIRECT', config('filament.path')),

    // We wire up a route for the "leave" button. You can change the middleware stack here if needed.
    'leave_middlewares' => [
        env('FILAMENT_IMPERSONATE_LEAVE_MIDDLEWARE', 'web'),
    ],

    'banner' => [
        // Currently supports 'dark' and 'light'.
        'style' => env('FILAMENT_IMPERSONATE_BANNER_STYLE', 'dark'),

        // Turn this off if you want `absolute` positioning, so the banner scrolls out of view
        'fixed' => env('FILAMENT_IMPERSONATE_BANNER_FIXED', true),

        // Currently supports 'top' and 'bottom'.
        'position' => env('FILAMENT_IMPERSONATE_BANNER_POSITION', 'top'),
    ],
];
