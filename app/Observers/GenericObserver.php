<?php
namespace App\Observers;

use App\Models\Log;

class GenericObserver
{
    protected $logAttributes = [
        'isi_berkas', 'tahun_berkas', 'kategori', 'kode_klasifikasi', 
        'klasifikasi', 'retensi_aktif', 'retensi_inaktif', 
        'jumlah_retensi', 'nasib', 'status', 'unit_olah'
    ];

    public function created($model): void
    {
        Log::create([
            'action' => 'created',
            'table_name' => $model->getTable(),
            'record_id' => $model->id,
            'new_data' => json_encode($model->only($this->logAttributes)),
        ]);
    }

    public function updated($model): void
    {
        Log::create([
            'action' => 'updated',
            'table_name' => $model->getTable(),
            'record_id' => $model->id,
            'new_data' => json_encode($model->only($this->logAttributes)),
        ]);
    }

    public function deleted($model): void
    {
        Log::create([
            'action' => 'deleted',
            'table_name' => $model->getTable(),
            'record_id' => $model->id,
            'new_data' => json_encode($model->only($this->logAttributes)),
        ]);
    }
}
