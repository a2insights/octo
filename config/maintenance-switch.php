<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Secret Token
    |--------------------------------------------------------------------------
    | This token will be used to allow access to the application while in
    | maintenance mode. You can set it to any string you want. If set,
    | it will then be passed to the Artisan ‘down’ command.
    |
    | Users will then be able to bypass the maintenance mode by visiting
    | the following URL: https://your-domain.test/{secret}
    |
    */

    'secret' => null,

    /*
    |--------------------------------------------------------------------------
    | Refresh Interval
    |--------------------------------------------------------------------------
    | Specifies the interval (in seconds) at which the page will be refreshed.
    | If set to false, auto-refresh will be disabled. This corresponds to
    | the '--refresh' option of the Artisan 'down' command.
    |
    */

    'refresh' => false,

    /*
    |--------------------------------------------------------------------------
    | Permissions
    |--------------------------------------------------------------------------
    | Only users with the following permissions will be able to toggle the
    | maintenance mode. If set to false, all authenticated users will be
    | able to activate or deactivate it.
    |
    */

    'permissions' => false,

    /*
    |--------------------------------------------------------------------------
    | Role
    |--------------------------------------------------------------------------
    | Define a role that will be used to check if a user can toggle the
    | maintenance mode. If set, users with this role will be able to
    | activate or deactivate it.
    |
    */

    'role' => 'super_admin',

    /*
    |--------------------------------------------------------------------------
    | Render Hook
    |--------------------------------------------------------------------------
    | You may customize the render hook used to display the maintenance mode
    | toggle button. If null, this will be set to 'global-search.before'.
    | The 'panels::' prefix will be added automatically if omitted.
    |
    */

    'render_hook' => 'global-search.before',

    /*
    |--------------------------------------------------------------------------
    | Icon
    |--------------------------------------------------------------------------
    | You may select a different Heroicon to display for the maintenance
    | toggle button. If null, the default will be 'heroicon-m-beaker'.
    |
    */

    'icon' => 'heroicon-m-beaker',

    /*
    |--------------------------------------------------------------------------
    | Minify Button
    |--------------------------------------------------------------------------
    | Setting this to true will only display a small icon as a toggle button.
    | Otherwise, the button will display the maintenance current state.
    |
    */

    'tiny_toggle' => false,

];
