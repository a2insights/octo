<?php

return [
    'users' => [
        'model' => A2Insights\FilamentSaas\User\User::class,
        'resource' => A2Insights\FilamentSaas\User\Filament\UserResource::class,
        'tenant_scope' => false,
    ],

    'companies' => [
        'model' => A2Insights\FilamentSaas\Tenant\Company::class,
    ],
];
