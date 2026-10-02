<?php

use App\Livewire\DocSearch;
use App\Support\Search\DocsSearchIndexer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Crawler\CrawlResponse;
use Spatie\SiteSearch\Drivers\DatabaseDriver;
use Spatie\SiteSearch\Models\SiteSearchConfig;

uses(RefreshDatabase::class);

it('only indexes the docs content of a page', function () {
    $html = <<<'HTML'
        <html>
            <head><title>Installing Ray - Ray</title></head>
            <body>
                <nav>Navigation link</nav>
                <article id="site-search-docs-content">
                    <h1>Installing Ray</h1>
                    <h2 id="requirements">Requirements</h2>
                    <p>Ray runs on macOS, Windows and Linux.</p>
                    <div data-no-index>Hidden from the index</div>
                </article>
                <footer>Footer text</footer>
            </body>
        </html>
        HTML;

    $indexer = new DocsSearchIndexer('https://myray.app/docs/getting-started/installation', CrawlResponse::fake($html));

    $texts = collect($indexer->entries())->pluck('text');

    expect($indexer->pageTitle())->toBe('Installing Ray - Ray')
        ->and($texts)->toContain('Ray runs on macOS, Windows and Linux.')
        ->and($texts)->not->toContain('Navigation link')
        ->and($texts)->not->toContain('Hidden from the index')
        ->and($texts)->not->toContain('Footer text');
});

it('searches the docs index in the database', function () {
    $config = SiteSearchConfig::create([
        'name' => 'docs',
        'crawl_url' => 'https://myray.app/docs',
        'index_base_name' => 'docs',
        'enabled' => true,
        'index_name' => 'docs-test',
    ]);

    DatabaseDriver::make($config)
        ->createIndex('docs-test')
        ->updateDocument('docs-test', [
            'id' => 'installation',
            'url' => 'https://myray.app/docs/getting-started/installation',
            'pageTitle' => 'Installing Ray - Ray',
            'h1' => 'Installing Ray',
            'entry' => 'Ray runs on macOS, Windows and <Linux>.',
            'description' => null,
        ]);

    Livewire::test(DocSearch::class)
        ->set('query', 'windows')
        ->assertSee('Installing Ray')
        ->assertSee('https://myray.app/docs/getting-started/installation')
        ->assertSeeHtml('<em>Windows</em>')
        ->assertSeeHtml('&lt;Linux&gt;');
});
