<?php

namespace App\Observers;
use App\Models\Log;
use App\Models\BerkasMusnah;

class BerkasMusnahObserver
{
    protected $logAttributes = ['isi_berkas', 'tahun_berkas', 'kategori', 'kode_klasifikasi', 'klasifikasi', 'updated_at', 'created_at'];
    /**
     * Handle the BerkasMusnah "created" event.
     */
    public function created(BerkasMusnah $berkasMusnah): void
    {
        //
    }

    /**
     * Handle the BerkasMusnah "updated" event.
     */
    public function updated(BerkasMusnah $berkasMusnah): void
    {
        //
    }

    /**
     * Handle the BerkasMusnah "deleted" event.
     */
    public function deleted(BerkasMusnah $berkasMusnah): void
    {
        Log::create([
            'action' => 'deleted',
            'table_name' => 'daftar_arsips',
            'record_id' => $berkasMusnah->id,
            'new_data' => json_encode($berkasMusnah->only($this->logAttributes)),
        ]);
    }

    /**
     * Handle the BerkasMusnah "restored" event.
     */
    public function restored(BerkasMusnah $berkasMusnah): void
    {
        //
    }

    /**
     * Handle the BerkasMusnah "force deleted" event.
     */
    public function forceDeleted(BerkasMusnah $berkasMusnah): void
    {
        //
    }
}
