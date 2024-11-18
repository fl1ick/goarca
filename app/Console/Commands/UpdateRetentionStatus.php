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
    $arsips = DB::table('daftar_arsips')->get(['id', 'tahun_berkas', 'jumlah_retensi', 'status', 'isi_berkas', 'kategori', 'kode_klasifikasi', 'klasifikasi', 'retensi_aktif', 'retensi_inaktif', 'nasib']);

    foreach ($arsips as $arsip) {
        $tahun_musnah = Carbon::createFromDate($arsip->tahun_berkas)->addYears($arsip->jumlah_retensi)->toDateString();

        // Jika tahun_musnah lebih kecil dari hari ini, update status 'nasib' menjadi 'Inaktif'
        if ($tahun_musnah < $today) {
            $oldData = ['status' => $arsip->status];

            // Update status 'nasib' menjadi 'Inaktif'
            DB::table('daftar_arsips')
                ->where('id', $arsip->id)
                ->update(['status' => 'Inaktif']);

            // Simpan log perubahan
            Log::create([
                'action' => 'updated',
                'table_name' => 'daftar_arsips',
                'record_id' => $arsip->id,
                'old_data' => json_encode($oldData),
                'new_data' => json_encode(['status' => 'Inaktif']),
            ]);

            $dataToMove = [
                'isi_berkas' => $arsip->isi_berkas,
                'tahun_berkas' => $arsip->tahun_berkas,
                'jumlah_retensi' => $arsip->jumlah_retensi,
                'kategori' => $arsip->kategori,
                'kode_klasifikasi' => $arsip->kode_klasifikasi,
                'klasifikasi' => $arsip->klasifikasi,
                'retensi_aktif' => $arsip->retensi_aktif,
                'retensi_inaktif' => $arsip->retensi_inaktif,
                'nasib' => $arsip->nasib,
                'status' => 'Inaktif',
            ];

            if (!DB::table('berkasinaktif')->where('isi_berkas', $arsip->isi_berkas)->exists()) {
                DB::table('berkasinaktif')->insert($dataToMove);
                // Hapus data dari daftar_arsips
                ## DB::table('daftar_arsips')->where('id', $arsip->id)->delete();

                Log::create([
                    'action' => 'moved',
                    'table_name' => 'daftar_arsips',
                    'record_id' => $arsip->id,
                    'old_data' => json_encode($arsip),
                    'new_data' => json_encode($dataToMove),
                ]);
            }

        } elseif ($tahun_musnah > $today) {
            $oldData = ['status' => $arsip->status];

            DB::table('daftar_arsips')
                ->where('id', $arsip->id)
                ->update(['status' => 'Aktif']);

            Log::create([
                'action' => 'updated',
                'table_name' => 'daftar_arsips',
                'record_id' => $arsip->id,
                'old_data' => json_encode($oldData),
                'new_data' => json_encode(['status' => 'Aktif']),
            ]);

            $dataToMoveActive = [
                'isi_berkas' => $arsip->isi_berkas,
                'tahun_berkas' => $arsip->tahun_berkas,
                'jumlah_retensi' => $arsip->jumlah_retensi,
                'kategori' => $arsip->kategori,
                'kode_klasifikasi' => $arsip->kode_klasifikasi,
                'klasifikasi' => $arsip->klasifikasi,
                'retensi_aktif' => $arsip->retensi_aktif,
                'retensi_inaktif' => $arsip->retensi_inaktif,
                'nasib' => $arsip->nasib,
                'status' => 'Aktif',
            ];

            // Check if record already exists in berkas_aktif
            if (!DB::table('berkasaktif')->where('isi_berkas', $arsip->isi_berkas)->exists()) {
                // Simpan data ke tabel berkas_aktif
                DB::table('berkasaktif')->insert($dataToMoveActive);

                // Log the move action for active status
                Log::create([
                    'action' => 'moved',
                    'table_name' => 'daftar_arsips',
                    'record_id' => $arsip->id,
                    'old_data' => json_encode($arsip),
                    'new_data' => json_encode($dataToMoveActive),
                ]);
            }
        }
    }

    $this->info('Cek barang kedaluwarsa selesai.');
}
}
