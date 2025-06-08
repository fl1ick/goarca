<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BerkasLama extends Model
{
    protected $table = 'berkas_lama';
    protected $fillable = [
        'isi_berkas', 'tahun_berkas', 'kategori', 'kode_klasifikasi', 
        'klasifikasi', 'retensi_aktif', 'retensi_inaktif', 'jumlah_retensi', 'nasib','status','unit_olah'
    ];
}
