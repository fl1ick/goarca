<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
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
    protected $description = 'Update status arsip Proses menjadi Inaktif dan pindahkan ke tabel berkasinaktif jika retensi telah habis';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now()->toDateString();

        // Ambil arsip yang statusnya "Proses" dan memenuhi syarat retensi habis
        $arsips = DB::table('daftar_arsips')
            ->where('status', 'Proses')
            ->whereRaw("DATE_ADD(tahun_berkas, INTERVAL jumlah_retensi YEAR) < ?", [$today])
            ->get();

        foreach ($arsips as $arsip) {
            // Data lama untuk log
            $oldData = [
                'status' => $arsip->status,
            ];

            // Update status arsip menjadi Inaktif
            DB::table('daftar_arsips')
                ->where('id', $arsip->id)
                ->update(['status' => 'Inaktif']);
            
            dd($arsips);

            // Pindahkan arsip ke tabel berkasinaktif
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

                // Hapus data dari daftar arsip
                DB::table('daftar_arsips')->where('id', $arsip->id)->delete();

                // Log pemindahan data
                Log::create([
                    'action' => 'moved',
                    'table_name' => 'daftar_arsips',
                    'record_id' => $arsip->id,
                    'old_data' => json_encode($arsip),
                    'new_data' => json_encode($dataToMove),
                ]);
            }

            // Log perubahan status
            Log::create([
                'action' => 'updated',
                'table_name' => 'daftar_arsips',
                'record_id' => $arsip->id,
                'old_data' => json_encode($oldData),
                'new_data' => json_encode(['status' => 'Inaktif']),
            ]);
        }

        $this->info('Data arsip status Proses telah diperbarui menjadi Inaktif dan dipindahkan ke berkasinaktif.');
    }
}
