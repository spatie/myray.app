<?php

namespace App\Domain\Docs\Sheets;

use Spatie\Sheets\ContentParser;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class RawMarkdownWithFrontMatterParser implements ContentParser
{
    public function parse(string $contents): array
    {
        $document = YamlFrontMatter::parse($contents);

        return array_merge(
            $document->matter(),
            ['contents' => $document->body()]
        );
    }
}
