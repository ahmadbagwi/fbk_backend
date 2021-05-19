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
        'admin/*',
        'user/*',
        'email/*',
        'cari-penerima',
        'cari-penerima/',
        'sanctum/csrf-cookie',
        'forgot-password',
        'user_login',
        'user_registrasi',
        'user_logout',
        'logout',
        'register',
        'dashboard',
        'dashboard/*',
        'dashboard/user/*',
        'profil-penerima/*',
        'blog/*',
        'arsip/*',
        'upload',
        'laravel-filemanager',
        'laravel-filemanager#',
        'biodata-pengajuan/*'
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        '*',
        'http://fbk.local',
        'http://backend.fbk.local',
        'https://fbk.id',
        'https://backend.fbk.id'
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
