<?php

use Illuminate\Foundation\Inspiring;
use App\Console\Commands\UpdateRetentionStatus;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

app(Schedule::class)->command('update:retention-status')->dailyAt('12:00');