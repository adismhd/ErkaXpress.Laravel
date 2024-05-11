<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\StatusPesananController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});
Route::post('/CekResi', [StatusPesananController::class, 'CekResi']);

Route::get('/login', function () {
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

Route::post('/LoginCheck', [UserController::class, 'Login']);
Route::get('/Logout', [UserController::class, 'Logout']);

Route::get('/HomeAdmin', [PesananController::class, 'home']);
// Route::get('/HomeAdmin', function () {
//     return view('adminHome', [
//         "title" => "Beranda"
//     ]);
// });
Route::get('/IndexPesanan', [PesananController::class, 'index']);

Route::get('/DetailPesanan/{id}', [PesananController::class, 'selectById']);
Route::post('/DetailPesanan/InsertStatus', [StatusPesananController::class, 'InsertStatus']);
Route::post('/DetailPesanan/EditStatus', [StatusPesananController::class, 'EditStatus']);
Route::post('/DetailPesanan/DeleteStatus', [StatusPesananController::class, 'DeleteStatus']);

Route::get('/Admin', [UserController::class, 'GetListAdmin']);
Route::post('/TambahUser', [UserController::class, 'TambahUser']);
Route::post('/EditUser', [UserController::class, 'EditUser']);

Route::post('/CreateMessage', [MessageController::class, 'CreateMessage']);
Route::get('/Message', [MessageController::class, 'GetMessage']);