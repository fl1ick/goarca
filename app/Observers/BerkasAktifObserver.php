<?php

namespace App\Observers;

use App\Models\BerkasAktif;
use App\Models\Log;

class BerkasAktifObserver
{
    protected $logAttributes = ['isi_berkas', 'tahun_berkas', 'kategori', 'kode_klasifikasi', 'klasifikasi', 'updated_at', 'created_at'];
    /**
     * Handle the BerkasAktif "created" event.
     */
    public function created(BerkasAktif $berkasAktif): void
    {
        //
    }

    /**
     * Handle the BerkasAktif "updated" event.
     */
    public function updated(BerkasAktif $berkasAktif): void
    {
        //
    }

    /**
     * Handle the BerkasAktif "deleted" event.
     */
    public function deleted(BerkasAktif $berkasAktif): void
    {
        Log::create([
            'action' => 'deleted',
            'table_name' => 'daftar_arsips',
            'record_id' => $berkasAktif->id,
            'new_data' => json_encode($berkasAktif->only($this->logAttributes)),
        ]);
    }

    /**
     * Handle the BerkasAktif "restored" event.
     */
    public function restored(BerkasAktif $berkasAktif): void
    {
        //
    }

    /**
     * Handle the BerkasAktif "force deleted" event.
     */
    public function forceDeleted(BerkasAktif $berkasAktif): void
    {
        //
    }
}
