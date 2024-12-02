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
                'kode' => 101,
                'kategori' => 'Actinic Keratosis',
            ],
            [
                'kode' => 102,
                'kategori' => 'Nevus',
            ],
            [
                'kode' => 103,
                'kategori' => 'Basal Cell Carcinoma',
            ],
            [
                'kode' => 104,
                'kategori' => 'Dermatofibroma',
            ],
            [
                'kode' => 105,
                'kategori' => 'Melanoma',
            ],
            [
                'kode' => 106,
                'kategori' => 'Pigmented Benign Keratosis',
            ],
            [
                'kode' => 107,
                'kategori' => 'Vascular Lesion',
            ],
        ]);
    }
}
