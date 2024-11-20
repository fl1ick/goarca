<?php

namespace App\Observers;

use App\Models\BerkasInaktif;
use App\Models\Log;

class BerkasInaktifObserver
{
    protected $logAttributes = ['isi_berkas', 'tahun_berkas', 'kategori', 'kode_klasifikasi', 'klasifikasi', 'updated_at', 'created_at'];
    
    /**
     * Handle the BerkasInaktif "created" event.
     */
    public function created(BerkasInaktif $berkasInaktif): void
    {
        //
    }

    /**
     * Handle the BerkasInaktif "updated" event.
     */
    public function updated(BerkasInaktif $berkasInaktif): void
    {
        //
    }

    /**
     * Handle the BerkasInaktif "deleted" event.
     */
    public function deleted(BerkasInaktif $berkasInaktif): void
    {
        Log::create([
            'action' => 'deleted',
            'table_name' => 'daftar_arsips',
            'record_id' => $berkasInaktif->id,
            'new_data' => json_encode($berkasInaktif->only($this->logAttributes)),
        ]);
    }

    /**
     * Handle the BerkasInaktif "restored" event.
     */
    public function restored(BerkasInaktif $berkasInaktif): void
    {
        //
    }

    /**
     * Handle the BerkasInaktif "force deleted" event.
     */
    public function forceDeleted(BerkasInaktif $berkasInaktif): void
    {
        //
    }
}
