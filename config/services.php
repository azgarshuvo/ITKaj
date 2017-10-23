<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],


    'paypal' => [
        'client_id' => 'Abm7OxE-lujI-BCbnZJ3GytUgjZm6kixT7yQF0fknH_Lud17x4hh7mvRGqu3PnuJI9nZMj17N_-Ev-cY',
        'secret' => 'ENAYhQ5muNYBcwIjizyLKea5_xYdGToqf8tu1U54p-SLd4gO_CPmvO655qWGUnYfpLMYfD0NmymRI9Ih'
    ],

];
