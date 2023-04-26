<?php

namespace App\Console;

use App\Console\Commands\PublishScheduledPostsCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command(PublishScheduledPostsCommand::class)->everyMinute();
    }

    protected function commands(): void
    {
        $this->load(__DIR__);
    }
}
