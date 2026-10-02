<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

beforeEach(function () {
    config([
        'database.connections.unreachable' => [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'port' => 1,
            'database' => 'unreachable',
            'username' => 'nobody',
            'password' => '',
        ],
        'database.default' => 'unreachable',
        'session.driver' => 'cookie',
        'cache.default' => 'file',
    ]);

    DB::purge();

    Http::preventStrayRequests();

    Http::fake([
        'spatie.be/api/price/*' => Http::response([], 404),
        'content.spatie.be/*' => Http::response(['data' => [], 'meta' => ['last_page' => 1]]),
    ]);
});

it('renders the pages without a database', function (string $url) {
    $this->get($url)->assertOk();
})->with([
    '/',
    '/docs/getting-started/installation',
    '/blog',
    '/feed',
    '/up',
]);

it('no longer shows a docs search box', function () {
    $this->get('/docs/getting-started/installation')
        ->assertOk()
        ->assertDontSee('Click to search');
});
