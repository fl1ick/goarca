<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        // Daftar perintah kustom Anda
        \App\Console\Commands\UpdateRetentionStatus::class,
    ];

    /**
     * Definisikan jadwal tugas untuk aplikasi Anda.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('update:retention-status')->daily(); // Atur sesuai kebutuhan
    }

    /**
     * Daftarkan perintah console aplikasi.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
