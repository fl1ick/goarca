<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{BerandaController,KategoryController,JraController,DaftarArsipController};
use App\Http\Controllers\AuthController;
use App\Models\DaftarArsip;

// Route::get('/', function () {return view('beranda');});
// Route::get('/beranda', function () {return view('beranda');});

Route::get('/aktif', function () {return view('aktif');});

Route::get('/', [BerandaController::class, 'index'])->name("beranda.index");
Route::get('/beranda', [BerandaController::class, 'index'])->name("beranda");
Route::get('/kategory', [KategoryController::class, 'index'])->name("kategory");
Route::get('/jra', [JraController::class, 'index'])->name("jra");

Route::get('/arsip', [DaftarArsipController::class, 'index'])->name("arsip");
Route::post('/arsip', [DaftarArsipController::class, 'store'])->name('arsip.store');
Route::get('/getKlasifikasi/{kodeKategori}', [DaftarArsipController::class, 'getKlasifikasi']);
