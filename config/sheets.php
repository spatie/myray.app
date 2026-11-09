<?php

return [
    'default_collection' => 'docs',

    'collections' => [
        'docs' => [
            'disk' => 'docs',
            'path_parser' => \App\Domain\Docs\Sheets\CustomPathParser::class,
            'sheet_class' => \App\Domain\Docs\Sheets\DocsPage::class,
            'content_parser' => \App\Support\RawMarkdownWithFrontMatterParser::class,
        ],
        'blog' => [
            'disk' => 'blog',
            'sheet_class' => \App\Domain\Blog\Post::class,
            'content_parser' => \App\Support\RawMarkdownWithFrontMatterParser::class,
        ],
    ],
];
