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
            $table->foreignId('kategory_id')->constrained('kategories')->onDelete('cascade'); // relasi dengan kategori
            $table->string('kode_klasifikasi');
            $table->string('klasifikasi');
            $table->string('KKAD');
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
        Schema::dropIfExists('jras');
    }
};
