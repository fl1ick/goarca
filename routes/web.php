<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('beranda');

});

Route::get('/kategory', [\App\Http\Controllers\Frontend\KategoryController::class, 'index'])->name("kategory");
Route::get('/jra', [\App\Http\Controllers\Frontend\JraController::class, 'index'])->name("jra");
