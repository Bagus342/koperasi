<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/pinjaman', function () {
    return view('pinjaman');
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

Route::get('/anggota', function () {
    return view('anggota');
});
