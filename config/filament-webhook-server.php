<?php

use Marjose123\FilamentWebhookServer\Pages\Webhooks;

return [
    /*
     *  Models that you want to be part of the webhooks options
     */
    'models' => [
        // \App\Models\User::class,
    ],
    /*
     */
    'polling' => '10s',
    'webhook' => [
        'keep_history' => true,
    ],
    'pages' => [
        \Octo\Webhook\Filament\Pages\Webhooks::class,
        \Octo\Webhook\Filament\Pages\WebhookHistory::class,
    ],
];
