<?php

namespace App\Providers;

use App\Models\Kategory;
use App\Models\Jra;
use App\Models\DaftarArsip;
use App\Observers\KategoryObserver;
use App\Observers\JraObserver;
use App\Observers\DaftarArsipObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Kategory::observe(KategoryObserver::class);
        Jra::observe(JraObserver::class);
        DaftarArsip::observe(DaftarArsipObserver::class);
    }
}
