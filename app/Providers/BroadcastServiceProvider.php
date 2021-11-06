<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Broadcast::routes([
            'middleware' => ['web', 'auth:sanctum'],
        ]);

        require base_path('routes/channels.php');
    }
}
