<?php

namespace App\Observers;

use App\Models\Jra;
use App\Models\Log;

class JraObserver
{
    /**
     * Handle the Jra "created" event.
     */
    public function created(Jra $jra): void
    {
        Log::create([
            'action' => 'created',
            'table_name' => 'jras',
            'record_id' => $jra->id,
            'new_data' => json_encode($jra->getAttributes()),
        ]);
    }

    /**
     * Handle the Jra "updated" event.
     */
    public function updated(Jra $jra): void
    {
        Log::create([
            'action' => 'updated',
            'table_name' => 'jras',
            'record_id' => $jra->id,
            'new_data' => json_encode($jra->getAttributes()),
        ]);
    }

    /**
     * Handle the Jra "deleted" event.
     */
    public function deleted(Jra $jra): void
    {
        Log::create([
            'action' => 'deleted',
            'table_name' => 'jras',
            'record_id' => $jra->id,
            'new_data' => json_encode($jra->getAttributes()),
        ]);
    }

    /**
     * Handle the Jra "restored" event.
     */
    public function restored(Jra $jra): void
    {
        //
    }

    /**
     * Handle the Jra "force deleted" event.
     */
    public function forceDeleted(Jra $jra): void
    {
        //
    }
}
