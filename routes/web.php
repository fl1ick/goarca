<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{BerandaController,KategoryController,JraController,BerkasAktifController,DaftarArsipController,BerkasInaktifController};

// Route::get('/', function () {return view('beranda');});
// Route::get('/beranda', function () {return view('beranda');});

Route::get('/aktif', function () {return view('aktif');});

Route::get('/', [BerandaController::class, 'index'])->name("beranda.index");
Route::get('/beranda', [BerandaController::class, 'index'])->name("beranda");
Route::get('/kategory', [KategoryController::class, 'index'])->name("kategory");
Route::get('berkasinaktif', [BerkasInaktifController::class, 'index'])->name("inaktif");
Route::get('berkasaktif', [BerkasAktifController::class, 'index'])->name("aktif");
Route::get('/jra', [JraController::class, 'index'])->name("jra");

Route::get('/arsip', [DaftarArsipController::class, 'index'])->name("arsip");
Route::delete('/arsip/{daftarArsip}', [DaftarArsipController::class, 'destroy'])->name('arsip.destroy');
Route::get('/arsipcreate', [DaftarArsipController::class, 'create'])->name("arsip.create");
Route::post('/arsip', [DaftarArsipController::class, 'store'])->name('arsip.store');
Route::get('/getKlasifikasi/{kodeKategori}', [DaftarArsipController::class, 'getKlasifikasi']);
