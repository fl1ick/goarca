<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\UpdateRetentionStatus::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // Ubah menjadi everyMinute untuk pengujian
        $schedule->command('update:retention-status')->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
