<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jras')->insert([
            [
                'kategory_id' => 1, // Sesuaikan dengan ID kategori yang ada di tabel kategories
                'kode_klasifikasi' => 'KL01',
                'klasifikasi' => 'Klasifikasi 1',
                'KKAD' => 'KKAD1',
                'retensi_aktif' => 5,
                'retensi_inaktif' => 10,
                'jumlah_retensi' => 15,
                'nasib' => 'Disimpan',
            ],
            [
                'kategory_id' => 2, // Sesuaikan dengan ID kategori yang ada di tabel kategories
                'kode_klasifikasi' => 'KL02',
                'klasifikasi' => 'Klasifikasi 2',
                'KKAD' => 'KKAD2',
                'retensi_aktif' => 3,
                'retensi_inaktif' => 7,
                'jumlah_retensi' => 10,
                'nasib' => 'Dibuang',
            ],
            // Tambahkan lebih banyak data sesuai kebutuhan
        ]);
    }
}
