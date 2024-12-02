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
                'klasifikasi' => 'Klasifikasi 1',
                'kode_kategori' => '101',
                'kode_klasifikasi' => 'KL01',
                'KKAD' => 'KKAD1',
                'retensi_aktif' => 5,
                'retensi_inaktif' => 10,
                'jumlah_retensi' => 15,
                'nasib' => 'Disimpan',
            ],
            [
                'klasifikasi' => 'Klasifikasi 2',
                'kode_kategori' => '102',
                'kode_klasifikasi' => 'KL01',
                'KKAD' => 'KKAD1',
                'retensi_aktif' => 5,
                'retensi_inaktif' => 10,
                'jumlah_retensi' => 15,
                'nasib' => 'Disimpan',
            ],
            [
                'klasifikasi' => 'Klasifikasi 3',
                'kode_kategori' => '103',
                'kode_klasifikasi' => 'KL01',
                'KKAD' => 'KKAD1',
                'retensi_aktif' => 5,
                'retensi_inaktif' => 10,
                'jumlah_retensi' => 15,
                'nasib' => 'Disimpan',
            ],
            [
                'klasifikasi' => 'Klasifikasi 4',
                'kode_kategori' => '104',
                'kode_klasifikasi' => 'KL01',
                'KKAD' => 'KKAD1',
                'retensi_aktif' => 5,
                'retensi_inaktif' => 10,
                'jumlah_retensi' => 15,
                'nasib' => 'Disimpan',
            ],
            [
                'klasifikasi' => 'Klasifikasi 5',
                'kode_kategori' => '105',
                'kode_klasifikasi' => 'KL01',
                'KKAD' => 'KKAD1',
                'retensi_aktif' => 5,
                'retensi_inaktif' => 10,
                'jumlah_retensi' => 15,
                'nasib' => 'Disimpan',
            ],
            [
                'klasifikasi' => 'Klasifikasi 6',
                'kode_kategori' => '106',
                'kode_klasifikasi' => 'KL01',
                'KKAD' => 'KKAD1',
                'retensi_aktif' => 5,
                'retensi_inaktif' => 10,
                'jumlah_retensi' => 15,
                'nasib' => 'Disimpan',
            ],
            [
                'klasifikasi' => 'Klasifikasi 7',
                'kode_kategori' => '107',
                'kode_klasifikasi' => 'KL01',
                'KKAD' => 'KKAD1',
                'retensi_aktif' => 5,
                'retensi_inaktif' => 10,
                'jumlah_retensi' => 15,
                'nasib' => 'Disimpan',
            ],
            // Tambahkan lebih banyak data sesuai kebutuhan
        ]);
    }
}
