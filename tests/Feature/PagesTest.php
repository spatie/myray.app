<?php

use Illuminate\Support\Facades\Http;

beforeEach(function () {
    Http::preventStrayRequests();

    Http::fake([
        'spatie.be/api/price/*' => Http::response([], 404),
        'content.spatie.be/*' => Http::response(['data' => [], 'meta' => ['last_page' => 1]]),
    ]);
});

it('renders the public pages', function (string $url) {
    $this->get($url)->assertOk();
})->with([
    '/',
    '/docs/getting-started/installation',
    '/blog',
    '/feed',
    '/privacy',
    '/terms-of-use',
    '/teaser',
    '/up',
]);

it('redirects the docs index to the first page', function () {
    $this->get('/docs')->assertRedirect();
});

it('serves the Context7 verification JSON', function (): void {
    $this->get('/docs/context7.json')
        ->assertOk()
        ->assertHeader('Content-Type', 'application/json')
        ->assertExactJson([
            'url' => 'https://context7.com/websites/myray_app',
            'public_key' => 'pk_HhX3Ptt0SOj5AslquUAbG',
        ]);
});

it('redirects old docs urls', function () {
    $this->get('/docs/features/mcp')->assertRedirect('/docs/features/ai');
});

it('returns a 404 for unknown docs pages', function () {
    $this->get('/docs/this-page-does-not-exist')->assertNotFound();
});
