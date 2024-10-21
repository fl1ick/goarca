<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daftar_arsips', function (Blueprint $table) {
            $table->id();
            $table->string('isi_berkas');
            $table->integer('tahun_berkas');
            $table->string('kategori');
            $table->string('kode_klasifikasi');
            $table->longText('klasifikasi');
            $table->integer('retensi_aktif');
            $table->integer('retensi_inaktif');
            $table->integer('jumlah_retensi');
            $table->string('nasib');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_arsips');
    }
};
