<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DaftarArsip extends Model
{
    use HasFactory;

    protected $fillable = [
        'isi_berkas', 'tahun_berkas', 'kategori', 'kode_klasifikasi', 
        'klasifikasi', 'retensi_aktif', 'retensi_inaktif', 'jumlah_retensi', 'nasib','status'
    ]; 
}
