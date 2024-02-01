<?php

return [
    'default_collection' => null,

    'collections' => [
        'docs' => [
            'disk' => 'docs',
            'path_parser' => \App\Domain\Docs\CustomPathParser::class,
        ]
    ],
];
