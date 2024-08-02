<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\InformasiUmumController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// ROUTE VIEW LOGIN
Route::get('/auth', [AuthController::class, 'login'])->middleware('guest')->name('login');
// ROUTE PROSES LOGIN
Route::post('/authenticate', [AuthController::class, 'authenticate']);
// SEMUA ROUTE AYNG MENGHARUSKAN LOGIN TERLEBIH DAHULU
Route::middleware(['auth'])->group(function () {
    // ROUTE DASHBOARD
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', function () {
        return view('welcome');
    });
    //ROUTE VIEW REGISTER
    Route::get('/auth/register', [AuthController::class, 'register']);
    //ROUTE VIEW CREATE
    Route::get('/auth/create', [AuthController::class, 'create']);
    // ROUTE SIMPAN USER BARU
    Route::post('/auth', [AuthController::class, 'store']);
    // ROUTE VIEW EDIT USER
    Route::get('/auth/edit/{uuid}', [AuthController::class, 'edit']);
    // ROUTE UPDATE USER
    Route::put('/auth/update/{uuid}', [AuthController::class, 'update']);
    // ROUTE DELETE USER
    Route::delete('/auth/delete/{uuid}', [AuthController::class, 'delete']);
    // ROUTE LOGOUT USER
    Route::get('/auth/logout', [AuthController::class, 'logout']);
    // ROUTE TAMPILAN YAYASAN
    Route::get('/profil/yayasan', [ProfileController::class, 'index_yayasan']);
    // ROUTE TAMPILAN SEKOLAH
    Route::get('/profil/sekolah', [ProfileController::class, 'index_sekolah']);
    // ROUTE TAMPILAN CREATE/EDIT SEKOLAH
    Route::get('/profil/sekolah/create', [ProfileController::class, 'create_sekolah']);
    // ROUTE TAMPILAN CREATE/EDIT YAYASAN
    Route::get('/profil/yayasan/create', [ProfileController::class, 'create_yayasan']);
    // ROUTE SINPAN PROFIL
    Route::post('/profil/store', [ProfileController::class, 'store']);
    // ROUTE TAMPILAN INFORMASI UMUM------------------------------------------------------------------------------
    Route::get('/informasi-umum', [InformasiUmumController::class, 'index']);
    // ROUTE TAMBAH DATA INFORMASI UMUM
    Route::get('/informasi-umum/create', [InformasiUmumController::class, 'create']);
    // ROUTE SIMPAN INFORMASI UMUM
    Route::post('/informasi-umum/store', [InformasiUmumController::class, 'store']);
    // ROUTE EDIT DATA INFORMASI UMUM
    Route::get('/informasi-umum/{informasiUmum:uuid}/edit', [InformasiUmumController::class, 'edit']);
    // ROUTE UPDATE INFORMASI UMUM
    Route::put('/informasi-umum/{informasiUmum:uuid}', [InformasiUmumController::class, 'update']);
    // ROUTE HAPUS INFORMASI UMUM
    Route::delete('/informasi-umum/{informasiUmum:uuid}', [InformasiUmumController::class, 'destroy']);
    // ROUTE TAMPILAN SARANA--------------------------------------------------------------------------------------
    Route::get('/sarana', [SaranaController::class, 'index']);
    // ROUTE TAMPILAN TAMBAH SARANA
    Route::get('/sarana/create', [SaranaController::class, 'create']);
    // ROUTE SIMPAN SARANA
    Route::post('/sarana/store', [SaranaController::class, 'store']);
    // ROUTE TAMPILAN EDIT SARANA
    Route::get('/sarana/{sarana:uuid}/edit', [SaranaController::class, 'edit']);
    // ROUTE UPDATE SARANA
    Route::put('/sarana/{sarana:uuid}', [SaranaController::class, 'update']);
    // ROUTE DELETE SARANA
    Route::delete('/sarana/{sarana:uuid}', [SaranaController::class, 'destroy']);
    // ROUTE KE CONTROLLER PEGAWAI
    Route::resource('/pegawai', PegawaiController::class);
    // ROUTE KE CONTROLLER PEGAWAI
    Route::resource('/tahun-ajaran', TahunAjaranController::class);
});
