<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCommand extends Command
{
    protected $signature = 'test';

    public function handle()
    {
        $collection = collect(['a', 'b', 'c'])
            ->map(fn(string $letter) => strtoupper($letter));

        ray($collection);

        $collection->reverse();
    }
}
