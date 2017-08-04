<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'client_id' => '207326123182-hejihgovm2ha8ocejvu21ni03ehjt36b.apps.googleusercontent.com',
        'client_secret' => 'AWa-C_OYdIP6iZmcBlQrge5e',
        'redirect' => 'http://indor.dev/login/google/callback',
    ],   

    'facebook' => [
        'client_id' => '118281768816366',
        'client_secret' => '3ce99e52df6e5eb727e420b7e5bf1f3e',
        'redirect' => 'http://indor.dev/login/facebook/callback',
    ],



];
