<?php

use App\Actions\FetchChangelogAction;
use App\Actions\GetChangelogAction;
use App\Actions\ParseChangelogAction;
use App\Actions\SyncChangelogAction;
use App\Support\ChangelogVersion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Exceptions;
use Mockery\MockInterface;

beforeEach(function () {
    Cache::flush();

    $this->versions = collect([
        new ChangelogVersion(
            version: '1.0.0',
            date: Carbon::parse('2026-07-15'),
            content: 'A resilient changelog release.',
        ),
    ]);
});

it('stores a successfully synced changelog indefinitely', function () {
    $this->mock(FetchChangelogAction::class, function (MockInterface $mock) {
        $mock->shouldReceive('execute')
            ->once()
            ->with('spatie', 'ray-app', 'main')
            ->andReturn('changelog markdown');
    });

    $this->mock(ParseChangelogAction::class, function (MockInterface $mock) {
        $mock->shouldReceive('execute')
            ->once()
            ->with('changelog markdown')
            ->andReturn($this->versions);
    });

    $versions = app(SyncChangelogAction::class)->execute();

    expect($versions)->toBe($this->versions)
        ->and(Cache::get(SyncChangelogAction::CacheKey))->toBe($this->versions)
        ->and(Cache::get(SyncChangelogAction::SyncedAtCacheKey))->toBe(now()->timestamp);
});

it('does not replace a cached changelog with an empty sync', function () {
    Cache::forever(SyncChangelogAction::CacheKey, $this->versions);
    Cache::forever(SyncChangelogAction::SyncedAtCacheKey, now()->subHour()->timestamp);

    $this->mock(FetchChangelogAction::class, function (MockInterface $mock) {
        $mock->shouldReceive('execute')->once()->andReturn('invalid changelog markdown');
    });

    $this->mock(ParseChangelogAction::class, function (MockInterface $mock) {
        $mock->shouldReceive('execute')->once()->andReturn(collect());
    });

    expect(fn () => app(SyncChangelogAction::class)->execute())
        ->toThrow(RuntimeException::class, 'does not contain any releases');

    expect(Cache::get(SyncChangelogAction::CacheKey))->toBe($this->versions);
});

it('renders cached versions while a failed stale refresh is reported', function () {
    Cache::forever(SyncChangelogAction::CacheKey, $this->versions);
    Cache::forever(SyncChangelogAction::SyncedAtCacheKey, now()->subHour()->timestamp);

    Exceptions::fake();

    $this->mock(SyncChangelogAction::class, function (MockInterface $mock) {
        $mock->shouldReceive('execute')
            ->once()
            ->andThrow(new RuntimeException('GitHub is unavailable.'));
    });

    $response = $this->get(route('changelog'));

    $response
        ->assertOk()
        ->assertSee('1.0.0')
        ->assertDontSee('We couldn’t load the changelog');

    defer()->invoke();

    Exceptions::assertReported(RuntimeException::class);
    expect(Cache::get(SyncChangelogAction::CacheKey))->toBe($this->versions);
});

it('renders an empty state when the initial sync fails', function () {
    Exceptions::fake();

    $this->mock(SyncChangelogAction::class, function (MockInterface $mock) {
        $mock->shouldReceive('execute')
            ->once()
            ->andThrow(new RuntimeException('GitHub is unavailable.'));
    });

    $this->get(route('changelog'))
        ->assertOk()
        ->assertSee('We couldn’t load the changelog right now. Please try again later.');

    Exceptions::assertReported(RuntimeException::class);
});

it('does not sync a fresh changelog', function () {
    Cache::forever(SyncChangelogAction::CacheKey, $this->versions);
    Cache::forever(SyncChangelogAction::SyncedAtCacheKey, now()->timestamp);

    $this->mock(SyncChangelogAction::class, function (MockInterface $mock) {
        $mock->shouldNotReceive('execute');
    });

    expect(app(GetChangelogAction::class)->execute())->toBe($this->versions);
});

it('returns the webhook response after a successful sync', function () {
    $this->mock(SyncChangelogAction::class, function (MockInterface $mock) {
        $mock->shouldReceive('execute')->once()->andReturn($this->versions);
    });

    $this->postJson(route('webhooks.changelog'))
        ->assertOk()
        ->assertExactJson([
            'success' => true,
            'versions_count' => 1,
        ]);
});

it('preserves cached versions when the webhook sync fails', function () {
    Cache::forever(SyncChangelogAction::CacheKey, $this->versions);

    $this->mock(SyncChangelogAction::class, function (MockInterface $mock) {
        $mock->shouldReceive('execute')
            ->once()
            ->andThrow(new RuntimeException('GitHub is unavailable.'));
    });

    $this->postJson(route('webhooks.changelog'))->assertServerError();

    expect(Cache::get(SyncChangelogAction::CacheKey))->toBe($this->versions);
});
