<?php

namespace App\Observers;

use App\Models\Kategory;
use App\Models\Log;

class KategoryObserver
{
    /**
     * Handle the Kategory "created" event.
     */
    public function created(Kategory $kategory): void
    {
        Log::create([
            'action' => 'created',
            'table_name' => 'kategories',
            'record_id' => $kategory->id,
            'new_data' => json_encode($kategory->getAttributes()),
        ]);
    }

    /**
     * Handle the Kategory "updated" event.
     */
    public function updated(Kategory $kategory): void
    {
        Log::create([
            'action' => 'updated',
            'table_name' => 'kategories',
            'record_id' => $kategory->id,
            'new_data' => json_encode($kategory->getAttributes()),
        ]);
    }

    /**
     * Handle the Kategory "deleted" event.
     */
    public function deleted(Kategory $kategory): void
    {
        Log::create([
            'action' => 'deleted',
            'table_name' => 'kategories',
            'record_id' => $kategory->id,
            'new_data' => json_encode($kategory->getAttributes()),
        ]);
    }

    /**
     * Handle the Kategory "restored" event.
     */
    public function restored(Kategory $kategory): void
    {
        //
    }

    /**
     * Handle the Kategory "force deleted" event.
     */
    public function forceDeleted(Kategory $kategory): void
    {
        //
    }
}
