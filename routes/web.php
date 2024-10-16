<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {return view('beranda');});
// Route::get('/beranda', function () {return view('beranda');});

Route::get('/aktif', function () {return view('aktif');});

Route::get('/', [\App\Http\Controllers\Frontend\BerandaController::class, 'index'])->name("beranda.index");
Route::get('/beranda', [\App\Http\Controllers\Frontend\BerandaController::class, 'index'])->name("beranda");
Route::get('/kategory', [\App\Http\Controllers\Frontend\KategoryController::class, 'index'])->name("kategory");
Route::get('/jra', [\App\Http\Controllers\Frontend\JraController::class, 'index'])->name("jra");
