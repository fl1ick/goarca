<?php

namespace App\Observers;

use App\Models\DaftarArsip;
use App\Models\Log;

class DaftarArsipObserver
{
    /**
     * Handle the DaftarArsip "created" event.
     */
    public function created(DaftarArsip $daftarArsip): void
    {
        Log::create([
            'action' => 'created',
            'table_name' => 'daftar_arsips',
            'record_id' => $daftarArsip->id,
            'new_data' => json_encode($daftarArsip->getAttributes()),
        ]);
    }

    /**
     * Handle the DaftarArsip "updated" event.
     */
    public function updated(DaftarArsip $daftarArsip): void
    {
        Log::create([
            'action' => 'updated',
            'table_name' => 'daftar_arsips',
            'record_id' => $daftarArsip->id,
            'new_data' => json_encode($daftarArsip->getAttributes()),
        ]);
    }

    /**
     * Handle the DaftarArsip "deleted" event.
     */
    public function deleted(DaftarArsip $daftarArsip): void
    {
        Log::create([
            'action' => 'deleted',
            'table_name' => 'daftar_arsips',
            'record_id' => $daftarArsip->id,
            'new_data' => json_encode($daftarArsip->getAttributes()),
        ]);
    }

    /**
     * Handle the DaftarArsip "restored" event.
     */
    public function restored(DaftarArsip $daftarArsip): void
    {
        //
    }

    /**
     * Handle the DaftarArsip "force deleted" event.
     */
    public function forceDeleted(DaftarArsip $daftarArsip): void
    {
        //
    }
}
