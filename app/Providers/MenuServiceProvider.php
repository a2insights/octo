<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        View::composer('navigation-menu', function ($view) {
            $view->with('menu', [
                [
                    'name'   => 'Dashboard',
                    'icon'   => 'dashboard',
                    'route'  => 'dashboard',
                    'active' => Route::is('dashboard'),
                ],
                [
                    'name'   => 'Notifications',
                    'icon'   => 'bell',
                    'route'  => 'notifications',
                    'active' => Route::is('notifications'),
                ],
            ]);
        });
    }
}
