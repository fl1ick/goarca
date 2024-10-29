<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DaftarArsip;
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
        $now = Carbon::now();

        // Ambil data DaftarArsip dan hitung retensi_inaktif berdasarkan tahun_berkas + jumlah_retensi
        DaftarArsip::chunkById(100, function ($arsips) use ($now) {
            foreach ($arsips as $arsip) {
                $retensiInaktif = Carbon::createFromDate($arsip->tahun_berkas)->addYears($arsip->jumlah_retensi);

                // Cek apakah retensi_inaktif sudah terlewati
                if ($now->greaterThanOrEqualTo($retensiInaktif)) {
                    $arsip->update(['status' => 'inactive']); // Ganti sesuai status yang diinginkan
                }
            }
        });

        $this->info('Retention status updated successfully!');
    }
}
