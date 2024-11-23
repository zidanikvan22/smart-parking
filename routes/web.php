<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RealTimeController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminZonaController;
use App\Http\Controllers\AdminSlotController;
use App\Http\Controllers\AdminAnalysisController;
use App\Http\Controllers\AdminApprovalController;

//Autentikasi
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login-proses', [AuthController::class, 'login_proses'])->name('login_proses');
Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('registrasi');
Route::post('/registrasi-proses', [AuthController::class, 'registrasi_proses'])->name('registrasi_proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::middleware('role:pengguna')->group(function(){
    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //Fitur Utama
    Route::get('/real-time', [RealTimeController::class, 'index'])->name('real-time');
    Route::get('/qr-code', [QrCodeController::class, 'index'])->name('qr-code');
    Route::get('/analysis', [AnalysisController::class, 'index'])->name('analysis');
    //ubah kata sandi
    Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('ubah-sandi');
    });

    Route::middleware('role:admin')->group(function(){
    //admin
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
        // user
        Route::get('/users', [AdminUserController::class, 'index'])->name('admin-users');
        Route::delete('/users/{id_pengguna}', [AdminUserController::class, 'delete'])->name('users.delete');
        // zona
        Route::get('/zona', [AdminZonaController::class, 'index'])->name('admin-zona');
        Route::post('/addZona', [AdminZonaController::class, 'store'])->name('zona.store');
        Route::put('/updateZona/{id_area}', [AdminZonaController::class, 'update'])->name('zona.update');
        Route::delete('/deleteZona/{id_area}', [AdminZonaController::class, 'destroy'])->name('zona.destroy');

        Route::get('/slot', [AdminSlotController::class, 'index'])->name('admin-slot');
        Route::post('/addSlot', [AdminSlotController::class, 'store'])->name('slot.store');

        Route::get('/analysis', [AdminAnalysisController::class, 'index'])->name('admin-analysis');
    });
    });
});
