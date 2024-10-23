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
        Schema::create('berkasinaktif', function (Blueprint $table) {
            $table->id();
            $table->longText('isiberkas');
            $table->date('tglberkas');
            $table->integer('kode_klasifikasi');
            $table->longText('klasifikasi');
            $table->integer('retensi_aktif');
            $table->integer('retensi_inaktif');
            $table->integer('jumlah_retensi');
            $table->date('tahun_musnah');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkasinaktif');
    }
};
