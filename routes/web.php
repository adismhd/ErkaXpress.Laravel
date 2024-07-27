<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\StatusPesananController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\XParameterController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\EkspedisiBiayaController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});
Route::post('/CekResi', [StatusPesananController::class, 'CekResi']);

Route::get('/login', function () {
    return view('adminView/login', [
        "title" => "Login"
    ]);
});


Route::get('/BuatPesanan', [PesananController::class, 'GetParamPesanan']);
Route::post('/SavePesanan', [PesananController::class, 'InsertData']);

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
Route::post('/DetailPesanan/EditStatusPembayaran', [PesananController::class, 'EditStatusPembayaran']);
Route::get('/MemoPesanan/{id}', [MemoController::class, 'GetData']);
Route::post('/MemoPesanan/InsertMemo', [MemoController::class, 'InsertMemo']);
Route::post('/MemoPesanan/EditMemo', [MemoController::class, 'EditMemo']);
Route::post('/MemoPesanan/DeleteMemo', [MemoController::class, 'DeleteMemo']);
Route::get('/EkspedisiBiaya/{id}', [EkspedisiBiayaController::class, 'GetData']);
Route::post('/EkspedisiBiaya/InsertEkspedisi', [EkspedisiBiayaController::class, 'InsertEkspedisi']);
Route::post('/EkspedisiBiaya/InsertBiaya', [EkspedisiBiayaController::class, 'InsertBiaya']);
Route::get('/DeletePesanan/{id}', [PesananController::class, 'DeleteDataPesanan']);

Route::get('/Admin', [UserController::class, 'GetListAdmin']);
Route::post('/TambahUser', [UserController::class, 'TambahUser']);
Route::post('/EditUser', [UserController::class, 'EditUser']);

Route::post('/CreateMessage', [MessageController::class, 'CreateMessage']);
Route::get('/Message', [MessageController::class, 'GetMessage']);

Route::get('/Parameter', [XParameterController::class, 'GetParamList']);
Route::post('/TambahParamProduk', [XParameterController::class, 'TambahParamProduk']);
Route::post('/EditParamProduk', [XParameterController::class, 'EditParamProduk']);
Route::post('/DeleteParamProduk', [XParameterController::class, 'DeleteParamProduk']);
Route::post('/TambahParamPropinsi', [XParameterController::class, 'TambahParamPropinsi']);
Route::post('/EditParamPropinsi', [XParameterController::class, 'EditParamPropinsi']);
Route::post('/DeleteParamPropinsi', [XParameterController::class, 'DeleteParamPropinsi']);
Route::post('/TambahParamStatus', [XParameterController::class, 'TambahParamStatus']);
Route::post('/EditParamStatus', [XParameterController::class, 'EditParamStatus']);
Route::post('/DeleteParamStatus', [XParameterController::class, 'DeleteParamStatus']);

Route::get('/UserProfile', [UserController::class, 'GetUserProfile']);
Route::post('/EditUserProfile', [UserController::class, 'EditUserProfile']);

//Vendor
Route::get('/BuatPesananBaju', [PesananController::class, 'GetParamPesananVendor']);
Route::get('/Invoice', function () {
    return view('publicView/vendorInvoice', [
        "title" => "Beranda"
    ]);
});
Route::post('/SavePesananVendor', [PesananController::class, 'InsertDataVendor']);
Route::get('/IndexPesananVendor', [PesananController::class, 'IndexVendor']);
Route::get('/DetailPesananVendor/{id}', [PesananController::class, 'SelectVendorById']);
Route::post('/DetailPesananVendor/EditStatusPembayaran', [PesananController::class, 'EditStatusPembayaran']);

//Parameter
Route::get('param-kabupaten/{id}', [XParameterController::class, 'GetParamKabupaten']);
Route::get('param-kecamatan/{id}', [XParameterController::class, 'GetParamKecamatan']);
Route::get('param-kelurahan/{id}', [XParameterController::class, 'GetParamKelurahan']);
Route::get('param-kodepos/{id}', [XParameterController::class, 'GetParamKodePos']);


