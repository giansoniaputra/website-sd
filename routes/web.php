<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
});
