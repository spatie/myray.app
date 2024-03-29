<?php

namespace App\Domain\Docs\Sheets;

use App\Domain\Docs\Enum\SheetType;
use Spatie\Sheets\PathParser;

class CustomPathParser implements PathParser
{
    public function parse(string $path): array
    {
        $parts = explode('/', $path);

        return [
            'parts' => $parts,
            'category' => implode('/', array_slice($parts, 0, -1)),
            'slug' => str_replace('.md', '', implode('/', $parts)),
            'type' => (end($parts) === '_index.md') ? SheetType::Category : SheetType::Page,
        ];
    }
}
