<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => [
        'api/*',
        'landing',
        'landing/*',
        'cari-penerima',
        'cari-penerima/',
        'login',
        'dashboard',
        'dashboard/*',
        'profil-penerima/*',
        'blog/*',
        'arsip/*'
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        '*',
        'http://fbk.local',
        'http://backend.fbk.local'
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
