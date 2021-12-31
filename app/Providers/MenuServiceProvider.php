<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('navigation-menu', function ($view) {
            $view->with('menu', $this->resolveMenu());
        });
    }

    private function resolveMenu()
    {
        return $this->{Auth::user()->dashboard ?? 'platform'}();
    }

    public function platform()
    {
        return [
            [
                'name'   => 'Dashboard',
                'icon'   => 'dashboard',
                'route'  => 'dashboard',
                'active' => Route::is('dashboard'),
            ],
        ];
    }

    public function system()
    {
        return [
            [
                'name'   => 'Dashboard',
                'icon'   => 'dashboard',
                'route'  => 'dashboard',
                'active' => Route::is('dashboard'),
            ],
            [
                'name'   => 'Users',
                'icon'   => 'users',
                'route'  => 'system.users',
                'active' => Route::is('system.users'),
            ],
            [
                'name'   => 'Site',
                'icon'   => 'site',
                'route'  => 'system.site',
                'active' => Route::is('system.site'),
            ],
        ];
    }
}
