<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\StatusPesananController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/Login', function () {
    return view('login', [
        "title" => "Login"
    ]);
});

Route::get('/BuatPesanan', function () {
    return view('buatPesanan', [
        "title" => "Buat Pesanan"
    ]);
});
Route::post('/BuatPesanan', [PesananController::class, 'InsertData']);

Route::get('/HalamanAdmin', [PesananController::class, 'index']);
Route::get('/DetailPesanan/{id}', [PesananController::class, 'selectById']);
Route::post('/DetailPesanan/InsertStatus', [StatusPesananController::class, 'InsertStatus']);

