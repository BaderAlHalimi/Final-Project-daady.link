<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '737388342263-c3men3uot7bkdo3qf5710l5rvpg6v22p.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://daady.link/auth/google/callback',
    ],
    'twitter' => [
        'client_id' => 'pnwRsX6mPNJTShC2N9NNYMg17',
        'client_secret' => 'EpC7y4cSTeyJXlMjvPqn6V7KfEp5aCk0ofcurWc8iKgrUVpHaB',
        'redirect' => 'https://daady.link/auth/twitter/callback',
    ],

];
