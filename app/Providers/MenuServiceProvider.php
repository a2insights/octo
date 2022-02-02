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
                'route'  => 'filament.pages.dashboard',
                'active' => Route::is('filament.pages.dashboard'),
            ],
        ];
    }

    public function system()
    {
        return [
            [
                'name'   => 'Dashboard',
                'icon'   => 'dashboard',
                'route'  => 'system.dashboard',
                'active' => Route::is('system.dashboard'),
            ],
            [
                'name'   => 'Users',
                'icon'   => 'users',
                'route'  => 'system.users.index',
                'active' => Route::is('system.users.index'),
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
