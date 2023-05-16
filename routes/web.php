<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/versi', function(){
    return view('welcome');
});

Route::get('/', function(){
    return view('index');
});

Route::get('/detail', function(){
    return view('detail');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/konfirmasi-email', [LoginController::class, 'konMail']);
Route::post('/konfirmasi-email', [LoginController::class, 'konMailLogic']);
Route::get('/reset-password', [LoginController::class, 'resetPass']);
Route::put('/reset-password', [LoginController::class, 'resetPassLogic']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/1', function(){
    return view('bagian_keisya.BuktiPembelian');
});
Route::get('/2', function(){
    return view('bagian_keisya.editPembelian');
});
Route::get('/3', function(){
    return view('bagian_keisya.emailConfirm');
});
Route::get('/4', function(){
    return view('bagian_keisya.ResetPass');
});
Route::get('/5', function(){
    return view('bagian_keisya.tambahDataproduk');
});
Route::get('/6', function(){
    return view('bagian_keisya.ubahPass');
});