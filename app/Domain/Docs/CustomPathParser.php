<?php

namespace App\Domain\Docs;

use Spatie\Sheets\PathParser;

class CustomPathParser implements PathParser
{
    public function parse(string $path): array
    {
        $parts = explode('/', $path);
        $slug = explode('.', $path)[0];

        return [
            'parts' => $parts,
            'category' => implode('/', array_slice($parts, 0, -1)),
            'slug' => implode('/', $parts),
        ];
    }
}
