<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::prefix('/admin')->group(function() {
    Route::prefix('/user')->group(function() {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'store']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::get('/{id}', [UserController::class, 'destroy']);
    });
});

Route::prefix('/pinjaman')->group(function() {
    Route::get('/', [PinjamController::class, 'index']);
});


Route::get('/simpan', function () {
    return view('simpanan');
});

Route::get('/angsur', function () {
    return view('angsuran');
});

Route::get('/denda', function () {
    return view('denda');
});


Route::prefix('/anggota')->group(function() {
    Route::get('/', [AnggotaController::class, 'index']);
    Route::get('/{id}', [AnggotaController::class, 'destroy']);
    Route::post('/', [AnggotaController::class, 'store']);
    Route::put('/{id}', [AnggotaController::class, 'update']);
});
