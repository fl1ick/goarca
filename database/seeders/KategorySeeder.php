<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategories')->insert([
            [
                'kode_kategori' => 101,
                'kategori' => 'Actinic Keratosis',
            ],
            [
                'kode_kategori' => 102,
                'kategori' => 'Nevus',
            ],
            [
                'kode_kategori' => 103,
                'kategori' => 'Basal Cell Carcinoma',
            ],
            [
                'kode_kategori' => 104,
                'kategori' => 'Dermatofibroma',
            ],
            [
                'kode_kategori' => 105,
                'kategori' => 'Melanoma',
            ],
            [
                'kode_kategori' => 106,
                'kategori' => 'Pigmented Benign Keratosis',
            ],
            [
                'kode_kategori' => 107,
                'kategori' => 'Vascular Lesion',
            ],
        ]);
    }
}
