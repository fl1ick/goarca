<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DaftarArsip;
use App\Models\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UpdateRetentionStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:retention-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now()->toDateString();
    
        // Ambil semua data yang dibutuhkan dari tabel daftar_arsips
        $arsips = DB::table('daftar_arsips')->get(['id', 'tahun_berkas', 'jumlah_retensi', 'nasib']);
    
        foreach ($arsips as $arsip) {
            // Hitung tahun_musnah (tahun_berkas + jumlah_retensi)
            $tahun_musnah = Carbon::createFromDate($arsip->tahun_berkas)->addYears($arsip->jumlah_retensi)->toDateString();
    
            // Jika tahun_musnah lebih kecil dari hari ini, update status 'nasib' menjadi 'Permanen'
            if ($tahun_musnah > $today) {
                // Ambil data lama sebelum diupdate
                $oldData = [
                    'nasib' => $arsip->nasib,
                ];

                // Update status 'nasib' menjadi 'Permanen'
                DB::table('daftar_arsips')
                    ->where('id', $arsip->id)
                    ->update(['nasib' => 'Musnah']);

                // Simpan log perubahan
                Log::create([
                    'action' => 'updated',
                    'table_name' => 'daftar_arsips',
                    'record_id' => $arsip->id,
                    'old_data' => json_encode($oldData), // Data sebelum perubahan
                    'new_data' => json_encode(['nasib' => 'Musnah']), // Data sesudah perubahan
                ]);
            }
        }
    
        $this->info('Cek barang kedaluwarsa selesai.');
    }
}
