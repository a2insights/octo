<?php

return [
    'admin_path' => 'admin',
    'tenant_path' => 'company',

    'users' => [
        'model' => App\Models\User::class,
        'resource' => \A2insights\FilamentSaas\User\Filament\UserResource::class,
        'tenant_scope' => false,
    ],
];
