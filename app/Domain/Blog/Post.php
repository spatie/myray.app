<?php

namespace App\Domain\Blog;

use Carbon\CarbonInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Date;
use League\CommonMark\Extension\Strikethrough\StrikethroughExtension;
use League\CommonMark\Extension\Table\TableExtension;
use Spatie\LaravelMarkdown\MarkdownRenderer;
use Spatie\Sheets\Sheet;
use Spatie\Sheets\Sheets;

class Post extends Sheet
{
    /** @return Collection<int, self> */
    public static function all(): Collection
    {
        return app(Sheets::class)->collection('blog')->all()
            ->filter(fn (self $post) => $post->published && $post->date->lessThanOrEqualTo(now()))
            ->sortBy([['date', 'desc'], ['slug', 'asc']])
            ->values();
    }

    public function getDateAttribute(string $date): CarbonInterface
    {
        return Date::parse($date);
    }

    public function getUpdatedAtAttribute(string $date): CarbonInterface
    {
        return Date::parse($date);
    }

    public function getContentAttribute(): string
    {
        return $this->renderMarkdown($this->contents);
    }

    public function getSummaryAttribute(string $summary): string
    {
        return $this->renderMarkdown($summary);
    }

    public function getHeaderImageAttribute(?string $path): ?string
    {
        return $path ? asset($path) : null;
    }

    public function getOgImageAttribute(?string $path): ?string
    {
        return $path ? asset($path) : null;
    }

    protected function renderMarkdown(string $markdown): string
    {
        return (new MarkdownRenderer(
            highlightTheme: 'nord',
            cacheStoreName: 'blog',
            renderAnchors: false,
            extensions: [TableExtension::class, StrikethroughExtension::class],
        ))->toHtml($markdown);
    }
}
