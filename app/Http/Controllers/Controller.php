<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $nav = [
            [
                'label' => 'User',
                'icon' => 'person',
                'url' => '#',
                'children' => [
                    [
                        'label' => 'Profile',
                        'route' => 'profile'
                    ],
                    [
                        'label' => 'Settings',
                        'route' => 'settings'
                    ],
                    [
                        'label' => 'Logout',
                        'action' => true,
                        'route' => 'logout'
                    ],
                ],
            ],
        ];

        $sidebar = [
            [
                'label' => 'Dashboard',
                'route' => 'dashboard',
                'icon' => 'dashboard'
            ],
            [
                'label' => 'Posts',
                'route' => 'post.index',
                'icon' => 'library_books'
            ]
        ];

        View::share ( 'nav',  $nav);
        View::share ( 'sidebar',  $sidebar);
    }
}
