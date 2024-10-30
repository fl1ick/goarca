<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DaftarArsip;
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
        // Ambil tanggal hari ini
        $today = Carbon::now()->toDateString();
    
        // Ambil semua data yang dibutuhkan dari tabel daftar_arsips
        $arsips = DB::table('daftar_arsips')->get(['id', 'tahun_berkas', 'jumlah_retensi']);
    
        foreach ($arsips as $arsip) {
            // Hitung tahun_musnah (tahun_berkas + jumlah_retensi)
            $tahun_musnah = Carbon::createFromDate($arsip->tahun_berkas)->addYears($arsip->jumlah_retensi)->toDateString();
    
            // Jika tahun_musnah lebih kecil dari hari ini, update status 'nasib' menjadi 'Musnah'
            if ($tahun_musnah < $today) {
                DB::table('daftar_arsips')
                    ->where('id', $arsip->id)
                    ->update(['nasib' => 'Permanen']);
            }
        }
    
        $this->info('Cek barang kedaluwarsa selesai.');
    }
}
