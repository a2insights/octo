<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Default Config
    |--------------------------------------------------------------------------
    |
    |
    |
    |
    */

    'navigation' => [
        'sidebar' =>  [
            [
                'label' => 'Dashboard',
                'route' => 'dashboard',
                'icon' => 'zondicon-dashboard',
            ],
            [
                'icon' => 'heroicon-o-user',
                'label' => 'Profile',
                'route' => 'profile.show'
            ],
            [
                'icon' => 'heroicon-o-key',
                'label' => 'API Tokens',
                'route' => 'api-tokens.index'
            ]
        ]
    ]
];
