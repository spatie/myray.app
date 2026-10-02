<?php

use Illuminate\Log\Events\MessageLogged;
use Illuminate\Support\Facades\Event;
use Mockery\MockInterface;
use Spatie\FlareClient\Flare;
use Spatie\FlareClient\FlareConfig;

beforeEach(function () {
    Event::fake([MessageLogged::class]);
});

it('reports exceptions to Flare when a key is configured', function () {
    app(FlareConfig::class)->apiToken = 'fake-flare-key';

    $exception = new RuntimeException('Something went wrong');

    $this->mock(Flare::class, function (MockInterface $mock) use ($exception) {
        $mock->shouldReceive('report')->once()->with($exception);
    });

    report($exception);
});

it('does not report exceptions to Flare without a key', function () {
    app(FlareConfig::class)->apiToken = null;

    $this->mock(Flare::class, function (MockInterface $mock) {
        $mock->shouldNotReceive('report');
    });

    report(new RuntimeException('Something went wrong'));
});
