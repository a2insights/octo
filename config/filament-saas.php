<?php

return [
    'admin_path' => 'sysadmin',
    'tenant_path' => 'admin',

    'users' => [
        'model' => App\Models\User::class,
        'resource' => \A2insights\FilamentSaas\User\Filament\UserResource::class,
        'tenant_scope' => false,
    ],
];
