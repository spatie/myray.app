<?php

it('crawls the docs without needing a queue worker', function () {
    $this->artisan('schedule:list')
        ->expectsOutputToContain('site-search:crawl --sync');
});
