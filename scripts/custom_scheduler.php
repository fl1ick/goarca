<?php

require __DIR__ . '/vendor/autoload.php';

use Illuminate\Support\Facades\Artisan;

// Jalankan command scheduler 'update:retention-status'
Artisan::call('update:retention-status');

echo Artisan::output();
