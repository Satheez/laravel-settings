<?php

return [
    'encryption' => [
        'enabled' => env('LARAVEL_SETTINGS_ENCRYPTION_ENABLED', true),
    ],

    'cache' => [
        'enabled' => env('LARAVEL_SETTINGS_CACHE_ENABLED', true),
        'ttl' => env('LARAVEL_SETTINGS_CACHE_TTL', 60 * 60),
    ],
];
