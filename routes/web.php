<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\AngkatanController;

Route::get('/', function () {
    return redirect('/rps');
});

// ================== PUBLIC (MAHASISWA) ==================
Route::get('/rps', [MatakuliahController::class, 'public']);

// ================== AUTHENTICATION ==================
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'authenticate']);
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

// ================== ADMIN (BUTUH LOGIN) ==================
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function() {
        return redirect('/prodi');
    });
    Route::resource('prodi', ProdiController::class);
    Route::resource('kurikulum', KurikulumController::class);
    Route::resource('angkatan', AngkatanController::class);
    Route::resource('semester', \App\Http\Controllers\SemesterController::class);
    Route::resource('matakuliah', MatakuliahController::class);
});