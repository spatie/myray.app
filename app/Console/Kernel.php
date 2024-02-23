<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Spatie\SiteSearch\Commands\CrawlCommand;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command(CrawlCommand::class)->everyThreeHours();
    }

    protected function commands(): void
    {
        $this->load(__DIR__);
        $this->load(__DIR__.'/Commands');
    }
}
