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
        Schema::create('jras', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kategori');
            $table->string('kode_klasifikasi');
            $table->longText('klasifikasi');
            $table->string('KKAD');
            $table->integer('retensi_aktif');
            $table->integer('retensi_inaktif');
            $table->integer('jumlah_retensi');
            $table->string('nasib');
            $table->timestamps();
            $table->foreign('kode_kategori')
            ->references('kode')
            ->on('kategories')
            ->onUpdate('cascade') // Untuk update otomatis jika parent berubah
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jras');
    }
};
