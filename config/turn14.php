<?php

declare(strict_types=1);

return [
    'credentials' => [
        'client_id' => env('TURN14_CLIENT_ID', ''),
        'client_secret' => env('TURN14_CLIENT_SECRET', ''),
    ],

    /**
     * This package caches queries automatically (for 1 hour per default).
     * Here you can set how long each query should be cached (in seconds).
     *
     * To turn cache off set this value to 0.
     */
    'cache_lifetime' => env('TURN14_CACHE_LIFETIME', 3600),

    /**
     * Path where the webhooks should be handled.
     */
    'webhook_path' => 'turn14-webhook/handle',

    /**
     * The webhook secret.
     *
     * This needs to be a string of your choice in order to use the webhook
     * functionality.
     */
    'webhook_secret' => env('TURN14_WEBHOOK_SECRET'),
];
