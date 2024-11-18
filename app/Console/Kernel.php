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
        $schedule->command('update:retention-status')
                ->cron('0 12 */2 * *') // Setiap 2 hari sekali pada pukul 12:00
                ->description('Update retention status every 2 days at 12 PM');
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
