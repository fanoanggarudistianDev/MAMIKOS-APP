<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KosController;
use App\Http\Controllers\AuthController;

// 1. Halaman utama — landing page
Route::get('/', [KosController::class, 'landing']);

// 2. RUTE AUTENTIKASI KUSTOM
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// 3. SEMUA MANAJEMEN KOS (Wajib Login)
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [KosController::class, 'dashboard']);

    // Kamar
    Route::get('/kamar', [KosController::class, 'indexKamar']);
    Route::post('/kamar', [KosController::class, 'storeKamar']);

    // Penghuni
    Route::get('/penghuni', [KosController::class, 'indexPenghuni']);
    Route::post('/penghuni', [KosController::class, 'storePenghuni']);

    // Pembayaran
    Route::get('/pembayaran', [KosController::class, 'indexPembayaran']);
    Route::post('/pembayaran', [KosController::class, 'storePembayaran']);
    Route::delete('/pembayaran/{pembayaran}', [KosController::class, 'destroyPembayaran'])->name('pembayaran.destroy');

    // Pengaduan
    Route::get('/pengaduan', [KosController::class, 'indexPengaduan']);
    Route::post('/pengaduan', [KosController::class, 'storePengaduan']);

    Route::middleware(['admin'])->group(function () {
        Route::get('/users', [KosController::class, 'indexUsers']);
        Route::get('/reports', [KosController::class, 'indexReports']);
        Route::get('/settings', [KosController::class, 'indexSettings']);
    });
});