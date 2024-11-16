<?php

return [
    'sysadmin_path' => 'sysadmin',
    'blog_path' => 'blog',
    'tenant_path' => 'admin',
    'site_path' => '/',

    'users' => [
        'model' => App\Models\User::class,
        'resource' => \A2Insights\FilamentSaas\User\Filament\UserResource::class,
        'tenant_scope' => false,
    ],
];
