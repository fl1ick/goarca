<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{AddUserController, ArsipLamaController, BerandaController, KategoryController, JraController, BerkasAktifController, DaftarArsipController, BerkasInaktifController, TatacaraController, PenjelasanController, BerkasMusnahController, BerkasPermanenController, AuthController};

// Route::get('/', function () {return view('beranda');});
// Route::get('/beranda', function () {return view('beranda');});

Route::get('/aktif', function () {
    return view('aktif');
});

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
Route::post('/arsip', [DaftarArsipController::class, 'store'])->name('arsip.store');
Route::get('/getKlasifikasi/{kodeKategori}', [DaftarArsipController::class, 'getKlasifikasi']);

Route::get('/tatacara', [TatacaraController::class, 'index'])->name('tatacara');
Route::get('/penjelasan', [PenjelasanController::class, 'index'])->name('penjelasan');
Route::get('/get-base64-image', function () {
    $path = public_path('img/dinas_arsip.png'); // Lokasi gambar di folder public
    $imageData = base64_encode(file_get_contents($path)); // Mengonversi gambar menjadi string Base64
    return response()->json(['image' => 'data:image/png;base64,' . $imageData]);
});

// AUTH
Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('login.action');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// AddUser
Route::get('/managementuser', [AddUserController::class, 'index'])->name('managementuser');
Route::post('/managementuser/store', [AddUserController::class, 'storeUser'])->name('storeuser');
Route::get('/user/reset-password/{id}', [AddUserController::class, 'resetPassword'])->name('user.resetPassword');

Route::get('/arsip/lama', [ArsipLamaController::class, 'index'])->name('arsip.lama');
Route::post('/arsip/lama/reset', [ArsipLamaController::class, 'reset'])->name('arsip.lama.reset');
Route::delete('/arsip/lama/delete-all', [ArsipLamaController::class, 'deleteAll'])->name('arsip.lama.deleteAll');
