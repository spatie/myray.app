<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

beforeEach(function () {
    Http::preventStrayRequests();

    Http::fake([
        'spatie.be/api/price/*' => Http::response([], 404),
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

it('redirects old docs urls', function () {
    $this->get('/docs/features/mcp')->assertRedirect('/docs/features/ai');
});

it('returns a 404 for unknown docs pages', function () {
    $this->get('/docs/this-page-does-not-exist')->assertNotFound();
});

it('advertises the lifetime offer through Tuesday midnight in Belgium', function (string $instant, bool $visible) {
    $this->travelTo(Carbon::parse($instant));

    $this->refreshApplication();

    Http::preventStrayRequests();
    Http::fake([
        'spatie.be/api/price/*' => Http::response([], 404),
    ]);

    foreach (['/', '/docs/getting-started/installation'] as $url) {
        $response = $this->get($url)->assertOk();

        if (! $visible) {
            $response
                ->assertDontSee(config('ray.lifetime_offer.text'))
                ->assertDontSee('Black Friday sale! Lifetime licenses also available');

            continue;
        }

        $response
            ->assertSee(config('ray.lifetime_offer.text'))
            ->assertSee('Black Friday sale! Lifetime licenses also available')
            ->assertSee('2026-12-02T00:00:00+01:00')
            ->assertDontSee('Buy a lifetime Ray license');
    }
})->with([
    'before the offer' => ['2026-11-24T22:59:59Z', false],
    'still available on Tuesday evening' => ['2026-12-01T21:30:00Z', true],
    'last second of Tuesday in Belgium' => ['2026-12-01T22:59:59Z', true],
    'expired at midnight in Belgium' => ['2026-12-01T23:00:00Z', false],
]);
