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

//Autentikasi
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login-proses', [AuthController::class, 'login_proses'])->name('login.proses');
Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('registrasi');
Route::post('/registrasi-proses', [AuthController::class, 'registrasi_proses'])->name('registrasi_proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Fitur Utama
Route::get('/real-time', [RealTimeController::class, 'index'])->name('real-time');
Route::get('/qr-code', [QrCodeController::class ,'index'])->name('qr-code');
Route::get('/analysis', [AnalysisController::class ,'index'])->name('analysis');

//ubah kata sandi
Route::get('/change-password', [ChangePasswordController::class ,'index'])->name('ubah-sandi');

//admin
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin-users');
    Route::get('/zona', [AdminZonaController::class, 'index'])->name('admin-zona');
    Route::get('/analysis', [AdminAnalysisController::class, 'index'])->name('admin-analysis');
    Route::get('/slot', [AdminSlotController::class, 'index'])->name('admin-slot');
});
