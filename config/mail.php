<?php

return [
    'default' => env('MAIL_MAILER', 'log'),

    'mailers' => [
        'log' => [
            'transport' => 'log',
            'channel'   => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'smtp' => [
            'transport'  => 'smtp',
            'host'       => env('MAIL_HOST', 'smtp.mailtrap.io'),
            'port'       => env('MAIL_PORT', 587),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username'   => env('MAIL_USERNAME'),
            'password'   => env('MAIL_PASSWORD'),
            'timeout'    => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN'),
        ],
    ],

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'noreply@chama.local'),
        'name'    => env('MAIL_FROM_NAME', 'Chama Digital'),
    ],
];
