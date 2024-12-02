<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jra extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori', 'kode_klasifikasi', 
        'klasifikasi', 'retensi_aktif', 'retensi_inaktif', 'jumlah_retensi', 'nasib'
    ];
    public function kategory()
    {
        return $this->belongsTo(Kategory::class, 'kode', 'kategori');
    }
}
