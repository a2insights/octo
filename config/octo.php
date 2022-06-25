<?php

return [
    'features' => [
        'billing' => env('BILLING_FEATURE', true),
    ],
    'free-plan-price-id' => env('FREE_PLAN_PRICE_ID', null),
];
