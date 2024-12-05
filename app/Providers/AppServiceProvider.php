<?php

namespace App\Providers;

use App\Models\{Kategory, Jra,DaftarArsip,BerkasAktif,BerkasInaktif,BerkasMusnah,BerkasPermanen};
use App\Observers\{KategoryObserver, JraObserver, DaftarArsipObserver, BerkasAktifObserver, BerkasInaktifObserver, GenericObserver};
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
        BerkasInaktif::observe(new GenericObserver());
        BerkasMusnah::observe(new GenericObserver());
        BerkasPermanen::observe(new GenericObserver());
    }
}
