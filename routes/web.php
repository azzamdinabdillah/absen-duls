<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AbsenController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/register', [LoginController::class, 'register'])->middleware('guest');

Route::post('/registerSystem', [LoginController::class, 'registerSystem']);
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

// Route::post('/halabsen', [AbsenController::class, 'index'])->middleware('auth');
Route::post('/absen', [AbsenController::class, 'absen']);
Route::post('/absenkeluar', [AbsenController::class, 'absenKeluar']);
