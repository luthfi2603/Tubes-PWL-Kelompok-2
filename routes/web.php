<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/halaman', function(){
    return view('halaman');
});

Route::get('/login', function(){
    return view('login');
});

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);