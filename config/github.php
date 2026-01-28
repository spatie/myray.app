<?php

return [

    'default' => 'main',

    'connections' => [

        'main' => [
            'method' => 'token',
            'token' => env('GITHUB_ACCESS_TOKEN'),
        ],

    ],

];
