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
        Schema::create('berkas_permanens', function (Blueprint $table) {
            $table->id();
            $table->string('isi_berkas');
            $table->date('tahun_berkas');
            $table->string('kategori');
            $table->string('kode_klasifikasi');
            $table->longText('klasifikasi');
            $table->integer('retensi_aktif');
            $table->integer('retensi_inaktif');
            $table->integer('jumlah_retensi');
            $table->string('nasib');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas_permanens');
    }
};
