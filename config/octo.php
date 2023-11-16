<?php

return [
    'admin_path' => 'admin',
    'users' => [
        'model' => App\Models\User::class,
    ],
    'features' => [
        'terms_service_and_privacy_policy' => [
            // public or private
            'disk_visibility' => 'public',
        ],
    ],
];
