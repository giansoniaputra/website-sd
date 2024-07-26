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

Route::get('/', function () {
    return view('welcome');
});

// USER
Route::get('/auth', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::middleware(['auth'])->group(function () {
    Route::get('/auth/register', [AuthController::class, 'register']);
    Route::post('/auth', [AuthController::class, 'store']);
    Route::put('/auth/update/{uuid}', [AuthController::class, 'update']);
    Route::delete('/auth/delete/{uuid}', [AuthController::class, 'delete']);
    Route::get('/auth/logout', [AuthController::class, 'logout']);
});
