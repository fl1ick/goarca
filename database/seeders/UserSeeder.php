<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'ArsipKotaMagelang',
                'email' => 'arsipkotamagelang@example.com', // Pastikan ini unik
                'password' => bcrypt('Arsip#1345'),
                'role' => 'admin',
                'registration_status' => true,
                'token' => null,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ],
            // Tambahkan lebih banyak pengguna jika perlu
        ]);
    }
}
