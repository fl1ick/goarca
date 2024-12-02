<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{BerandaController,KategoryController,JraController,BerkasAktifController,DaftarArsipController,BerkasInaktifController,TatacaraController,PenjelasanController, BerkasMusnahController,BerkasPermanenController};

// Route::get('/', function () {return view('beranda');});
// Route::get('/beranda', function () {return view('beranda');});

Route::get('/aktif', function () {return view('aktif');});

Route::get('/', [BerandaController::class, 'index'])->name("beranda.index");
Route::get('/beranda', [BerandaController::class, 'index'])->name("beranda");
Route::get('/kategory', [KategoryController::class, 'index'])->name("kategory");
Route::get('/berkasinaktif', [BerkasInaktifController::class, 'index'])->name("inaktif");
Route::delete('/berkasinaktif/{berkasInaktif}', [BerkasInaktifController::class, 'destroy'])->name('berkasinaktif.destroy');
Route::get('/berkasaktif', [BerkasAktifController::class, 'index'])->name("aktif");
Route::delete('/berkasaktif/{berkasAktif}', [BerkasAktifController::class, 'destroy'])->name('berkasaktif.destroy');
Route::get('/jra', [JraController::class, 'index'])->name("jra");
Route::get('/berkasmusnah', [BerkasMusnahController::class, 'index'])->name('berkasmusnah.index');
Route::get('/berkaspermanen', [BerkasPermanenController::class, 'index'])->name('berkaspermanen.index');


Route::get('/arsip', [DaftarArsipController::class, 'index'])->name("arsip");
Route::delete('/arsip/{daftarArsip}', [DaftarArsipController::class, 'destroy'])->name('arsip.destroy');
Route::get('/arsipcreate', [DaftarArsipController::class, 'create'])->name("arsip.create");
Route::post('/arsip', [DaftarArsipController::class, 'store'])->name('arsip.store');
Route::get('/getKlasifikasi/{kodeKategori}', [DaftarArsipController::class, 'getKlasifikasi']);

Route::get('/tatacara', [TatacaraController::class, 'index'])->name('tatacara');
Route::get('/penjelasan', [PenjelasanController::class, 'index'])->name('penjelasan');
Route::get('/get-base64-image', function() {
    $path = public_path('img/dinas_arsip.png'); // Lokasi gambar di folder public
    $imageData = base64_encode(file_get_contents($path)); // Mengonversi gambar menjadi string Base64
    return response()->json(['image' => 'data:image/png;base64,' . $imageData]);
});

