<?php

return [
    'admin_path' => 'admin',
    'tenant_path' => 'company',

    'users' => [
        'model' => App\Models\User::class,
        'resource' => Octo\User\Filament\UserResource::class,
        'tenant_scope' => false,
    ],
];
