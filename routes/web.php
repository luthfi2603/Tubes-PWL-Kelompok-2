<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TampilanController;

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

Route::get('/', [TampilanController::class, 'myProduct']);
Route::get('/detail/{product}', [TampilanController::class, 'detailProduct']);
Route::get('/keranjang', [TampilanController::class, 'showKeranjang']);
Route::post('/keranjang', [TampilanController::class, 'keranjang']);
Route::delete('/keranjang/{keranjang}/delete', [TampilanController::class, 'deleteProduct'])->name('productKeranjang.delete');
Route::delete('/keranjang/delete', [TampilanController::class, 'deleteAllProduct'])->name('productKeranjangAll.delete');
Route::get('/konfirmasi-pembayaran', [TampilanController::class, 'konfirBayar']);
Route::post('/konfirmasi-pembayaran-logic', [TampilanController::class, 'konfirBayarLogic']);
Route::get('/bukti-pembelian', [TampilanController::class, 'buktiPembelian']);
Route::post('/bukti-pembelian', [TampilanController::class, 'selesaiBuktiPembelian']);
Route::get('/search', [TampilanController::class, 'pencarian']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/konfirmasi-email', [LoginController::class, 'konMail']);
Route::post('/konfirmasi-email', [LoginController::class, 'konMailLogic']);
Route::get('/reset-password', [LoginController::class, 'resetPass']);
Route::put('/reset-password', [LoginController::class, 'resetPassLogic']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/profil/{user:username}', [RegisterController::class, 'showProfil'])->name('profil');
Route::put('/profil/{user}', [RegisterController::class, 'editProfil'])->name('profil.update');
Route::delete('/profil/{user}/delete', [RegisterController::class, 'deleteAkun'])->name('akun.delete');
Route::get('/profil/reset-password/ubah', [RegisterController::class, 'showResetPassword']);
Route::put('/profil/reset-password/ubah', [RegisterController::class, 'ResetPassword']);

Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');
Route::get('/admin/users', [AdminController::class, 'myUsers'])->middleware('admin');
Route::get('/admin/users/create', [AdminController::class, 'showCreateUser'])->middleware('admin');
Route::post('/admin/users/create', [AdminController::class, 'createUser'])->middleware('admin');
Route::get('/admin/users/{user}/edit', [AdminController::class, 'showEditUser'])->name('users.edit')->middleware('admin');
Route::put('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.update')->middleware('admin');
Route::delete('/admin/users/{user}/delete', [AdminController::class, 'deleteUser'])->name('users.delete')->middleware('admin');
Route::get('/admin/products', [AdminController::class, 'products'])->middleware('admin');
Route::get('/admin/products/add', [AdminController::class, 'showAddProduct'])->middleware('admin');
Route::post('/admin/products/add', [AdminController::class, 'addProduct'])->middleware('admin');
Route::get('/admin/products/{product}/edit', [AdminController::class, 'showEditProduct'])->name('products.edit')->middleware('admin');
Route::put('/admin/products/{product}/edit', [AdminController::class, 'editProduct'])->name('products.update')->middleware('admin');
Route::get('/admin/pesanan', [AdminController::class, 'pesanan'])->middleware('admin');
Route::delete('/admin/products/{product}/delete', [AdminController::class, 'deleteProduct'])->name('products.delete')->middleware('admin');


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