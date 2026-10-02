<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

uses(RefreshDatabase::class);

it('crawls the docs without needing a queue worker', function () {
    $this->artisan('schedule:list')
        ->expectsOutputToContain('site-search:crawl --sync')
        ->expectsOutputToContain('app:prune-expired-cache-entries');
});

it('prunes expired database cache entries', function () {
    $store = Cache::store('database');

    $store->put('expired', 'value', 60);
    $store->put('valid', 'value', 3600);
    $store->forever('forever', 'value');

    $this->travel(2)->minutes();

    $this->artisan('app:prune-expired-cache-entries')->assertSuccessful();

    expect(DB::table('cache')->count())->toBe(2)
        ->and($store->get('valid'))->toBe('value')
        ->and($store->get('forever'))->toBe('value');
});

it('can store binary values in the database cache', function () {
    $binaryValue = "\xD2\x01\x0Av\x0At";

    Cache::store('database')->put('binary-value', $binaryValue);

    expect(Cache::store('database')->get('binary-value'))->toBe($binaryValue);
});
