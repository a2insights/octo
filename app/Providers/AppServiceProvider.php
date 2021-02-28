<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $sidebarItems = [
            [
                'label' => 'Dashboard',
                'route' => 'dashboard',
                'icon' => 'zondicon-dashboard',
            ],
            [
                'label' => 'User',
                'icon' => 'heroicon-o-bell',
                'url' => '#',
                'children' => [
                    [
                        'label' => 'Profile',
                        'route' => 'profile.show'
                    ],
                ],
            ]
        ];

        View::share('sidebar',  ['items' => $sidebarItems]);
    }

    public function boot()
    {
        //
    }
}
