<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\kasirController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\riwayatPembelianController;
use App\Http\Controllers\userController;

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

Route::get('/', [loginController::class, 'index'])->name('login');
Route::post('/actlogin', [loginController::class, 'actLogin'])->name('actlogin');

Route::middleware(['auth'])->group(function () {
    // dashboard
    Route::get('/dashboard', [adminController::class, 'index'])->name('dashboard');
    Route::get('/logout', [loginController::class, 'logout'])->name('logout');
    // Kasir
    Route::get('/kasir', [kasirController::class, 'index'])->name('kasir');
    Route::post('/to_cart', [kasirController::class, 'to_cart'])->name('to_cart');
    Route::post('/update_jumlah', [kasirController::class, 'update_jumlah'])->name('update_jumlah');
    Route::get('/destroy_cart/{id_barang}', [kasirController::class, 'destroy_cart'])->name('destroy_cart');
    Route::post('/simpan_pembelian', [kasirController::class, 'store'])->name('simpan_pembelian');
    Route::get('/stroke', [kasirController::class, 'stroke'])->name('stroke');
    // Produk
    Route::get('/produk', [barangController::class, 'index'])->name('produk');
    Route::get('/tambah_produk', [barangController::class, 'create'])->name('tambah_produk');
    Route::get('/edit_produk/{id_barang}', [barangController::class, 'edit'])->name('edit_produk');
    Route::get('/destroy_produk/{id_barang}', [barangController::class, 'destroy'])->name('delete_produk');
    Route::post('/store_produk', [barangController::class, 'store'])->name('store_produk');
    Route::post('/update_produk', [barangController::class, 'update'])->name('update_produk');
    //Keuangan
    Route::get('/riwayat_pembelian', [riwayatPembelianController::class, 'index'])->name('riwayat_pembelian');
    Route::get('/destroy_pembelian/{id_pembelian}', [riwayatPembelianController::class, 'destroy'])->name('destroy_pembelian');
    Route::get('/show_pembelian/{id_pembelian}', [riwayatPembelianController::class, 'show'])->name('show_pembelian');
    Route::get('/riwayatByUser/{id_user}', [riwayatPembelianController::class, 'riwayatByUser'])->name('riwayatByUser');
    // User
    Route::get('/user', [userController::class, 'index'])->name('user')->middleware('akses:manager');
    Route::get('/tambah_user', [userController::class, 'create'])->name('create_user')->middleware('akses:manager');
    Route::post('/store_user', [userController::class, 'store'])->name('store_user')->middleware('akses:manager');
    Route::get('/destroy_user/{id_user}', [userController::class, 'destroy'])->name('destroy_user')->middleware('akses:manager');
});
