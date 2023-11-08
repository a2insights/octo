<?php

use SolutionForest\FilamentFirewall\Filament\Resources\FirewallIpResource;
use SolutionForest\FilamentFirewall\Models\Ip;

return [
    'models' => [
        'ip' => Ip::class,
    ],
    'resources' => [
        FirewallIpResource::class,
    ],
    'skip_whitelist_range' => [
        '127.0.0.1',
        '172.16.0.0/12',
    ],
];
