<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BerkasMusnah extends Model
{
    protected $fillable = [
        'isi_berkas', 'tahun_berkas', 'kategori', 'kode_klasifikasi', 
        'klasifikasi', 'retensi_aktif', 'retensi_inaktif', 'jumlah_retensi', 'nasib','status'
    ];
    protected $table = 'berkas_musnahs';
}
