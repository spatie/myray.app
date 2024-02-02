<?php

return [
    'default_collection' => null,

    'collections' => [
        'docs' => [
            'disk' => 'docs',
            'path_parser' => \App\Domain\Docs\Sheets\CustomPathParser::class,
            'sheet_class' => \App\Domain\Docs\Sheets\DocsPage::class,
            'content_parser' => \App\Domain\Docs\Sheets\RawMarkdownWithFrontMatterParser::class,
        ]
    ],
];
