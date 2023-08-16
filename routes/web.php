<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SistemController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

// Customor
Route::get('/customer', [SistemController::class, 'CustomerIndex'])->name('customer')->middleware('auth');
Route::get('/customer/create', [SistemController::class, 'CustomerCreate'])->name('customer/create')->middleware('auth');
Route::get('/customer/edit/{id_customer}', [SistemController::class, 'CustomerEdit'])->name('customer/edit')->middleware('auth');
Route::post('/customer/edit/post/{id_customer}', [SistemController::class, 'CustomerEditPost'])->name('customer/edit/post')->middleware('auth');
Route::post('/customer/hapus/{id_customer}', [SistemController::class, 'CustomerHapus'])->name('customer/hapus')->middleware('auth');
Route::post('/customer/create/store', [SistemController::class, 'CustomerStore'])->name('customer/create/store')->middleware('auth');

// Barang
Route::get('/barang', [SistemController::class, 'BarangIndex'])->name('barang')->middleware('auth');
Route::get('/barang/create', [SistemController::class, 'BarangCreate'])->name('barang/create')->middleware('auth');
Route::get('/barang/edit/{id_barang}', [SistemController::class, 'BarangEdit'])->name('barang/edit')->middleware('auth');
Route::post('/barang/edit/post/{id_barang}', [SistemController::class, 'BarangEditPost'])->name('barang/edit/post')->middleware('auth');
Route::post('/barang/hapus/{id_barang}', [SistemController::class, 'BarangHapus'])->name('barang/hapus')->middleware('auth');
Route::post('/barang/create/store', [SistemController::class, 'BarangStore'])->name('barang/create/store')->middleware('auth');

// Supplier
Route::get('/supplier', [SistemController::class, 'SupplierIndex'])->name('supplier')->middleware('auth');
Route::get('/supplier/create', [SistemController::class, 'SupplierCreate'])->name('supplier/create')->middleware('auth');
Route::get('/supplier/edit/{id_supplier}', [SistemController::class, 'SupplierEdit'])->name('supplier/edit')->middleware('auth');
Route::post('/supplier/edit/post/{id_supplier}', [SistemController::class, 'SupplierEditPost'])->name('supplier/edit/post')->middleware('auth');
Route::post('/supplier/hapus/{id_supplier}', [SistemController::class, 'SupplierHapus'])->name('supplier/hapus')->middleware('auth');
Route::post('/supplier/create/store', [SistemController::class, 'SupplierStore'])->name('supplier/create/store')->middleware('auth');

// Pembelian
Route::get('/pembelian', [SistemController::class, 'PembelianIndex'])->name('pembelian')->middleware('auth');
Route::get('/pembelian/create', [SistemController::class, 'Pembeliancreate'])->name('pembelian/create')->middleware('auth');
Route::post('/pembelian/create/store', [SistemController::class, 'PembelianStore'])->name('pembelian/create/store')->middleware('auth');
Route::get('/pembelian/edit/{id_pembelian}', [SistemController::class, 'PembelianEdit'])->name('pembelian/edit')->middleware('auth');
Route::post('/pembelian/edit/post/{id_pembelian}', [SistemController::class, 'PembelianEditPost'])->name('pembelian/edit/post')->middleware('auth');
Route::post('/pembelian/hapus/{id_pembeian}', [SistemController::class, 'PembelianHapus'])->name('pembelian/hapus')->middleware('auth');

// Bahan Baku
Route::get('/bahan-baku', [SistemController::class, 'BahanBakuIndex'])->name('bahan-baku')->middleware('auth');
Route::get('/bahan-baku/create', [SistemController::class, 'BahanBakucreate'])->name('bahan-baku/create')->middleware('auth');
Route::post('/bahan-baku/create/store', [SistemController::class, 'BahanBakuStore'])->name('bahan-baku/create/store')->middleware('auth');
Route::get('/bahan-baku/edit/{id_bahanbaku}', [SistemController::class, 'BahanBakuEdit'])->name('bahan-baku/edit')->middleware('auth');
Route::post('/bahan-baku/edit/post/{id_bahanbaku}', [SistemController::class, 'BahanBakuEditPost'])->name('bahan-baku/edit/post')->middleware('auth');
Route::post('/bahan-baku/hapus/{id_bahanbaku}', [SistemController::class, 'BahanBakuHapus'])->name('bahan-baku/hapus')->middleware('auth');


// Beban Pengiriman
Route::get('/beban/pengiriman', [SistemController::class, 'PengirimanIndex'])->name('beban/pengiriman')->middleware('auth');
Route::get('/beban/pengiriman/create', [SistemController::class, 'Pengirimancreate'])->name('beban/pengiriman/create')->middleware('auth');
Route::post('/beban/pengiriman/store', [SistemController::class, 'PengirimanStore'])->name('beban/pengiriman/store')->middleware('auth');
Route::get('/beban/pengiriman/edit/{id_penjualan}', [SistemController::class, 'PengirimanEdit'])->name('beban/pengiriman/edit')->middleware('auth');
Route::post('/beban/pengiriman/edit/post/{id_penjualan}', [SistemController::class, 'PengirimanEditPost'])->name('beban/pengiriman/edit/post')->middleware('auth');
Route::post('/beban/pengiriman/hapus/{id_penjualan}', [SistemController::class, 'PengirimanHapus'])->name('beban/pengiriman/hapus')->middleware('auth');
Route::get('/konfirmasi/pengiriman/{id_penjualan}', [SistemController::class, 'PengirimanKonfirm'])->name('konfirmasi/pengiriman')->middleware('auth');
Route::post('/konfirmasi/pengiriman/post/{id_penjualan}', [SistemController::class, 'PengirimanKonfirmPost'])->name('konfirmasi/pengiriman/post')->middleware('auth');


// Penjualan Barang
Route::get('/penjualan/barang', [SistemController::class, 'PenjualanIndex'])->name('penjualan/barang')->middleware('auth');
Route::get('/penjualan/barang/create', [SistemController::class, 'Penjualancreate'])->name('penjualan/barang/create')->middleware('auth');
Route::post('/penjualan/barang/create/store', [SistemController::class, 'PenjualanStore'])->name('penjualan/barang/create/store')->middleware('auth');
Route::get('/penjualan/barang/edit/{id_penjualan}', [SistemController::class, 'PenjualanEdit'])->name('penjualan/barang/edit')->middleware('auth');
Route::post('/penjualan/barang/edit/post/{id_penjualan}', [SistemController::class, 'PenjualanEditPost'])->name('penjualan/barang/edit/post')->middleware('auth');
Route::post('/penjualan/barang/hapus/{id_penjualan}', [SistemController::class, 'PenjualanHapus'])->name('penjualan/barang/hapus')->middleware('auth');

// Laporan Pembelian
Route::get('/laporan/pembelian/bahan/baku', [LaporanController::class, 'PembelianIndex'])->name('laporan/pembelian/bahan/baku')->middleware('auth');
Route::get('/laporan/pembelian/bahan/baku/pdf', [LaporanController::class, 'PembelianPDF'])->name('laporan/pembelian/bahan/baku/pdf')->middleware('auth');
// Laporan Bahan Baku
Route::get('/laporan/bahan/baku', [LaporanController::class, 'BakuIndex'])->name('laporan/bahan/baku')->middleware('auth');
Route::get('/laporan/bahan/baku/pdf', [LaporanController::class, 'BakuPDF'])->name('laporan/bahan/baku/pdf')->middleware('auth');
// Laporan Penjualan
Route::get('/laporan/penjualan/barang', [LaporanController::class, 'PenjualanIndex'])->name('laporan/penjualan/barang')->middleware('auth');
Route::get('/laporan/penjualan/barang/pdf', [LaporanController::class, 'PenjualanPDF'])->name('laporan/penjualan/barang/pdf')->middleware('auth');
// Laporan Pengiriman
Route::get('/laporan/beban/pengiriman', [LaporanController::class, 'PengirimanIndex'])->name('laporan/beban/pengiriman')->middleware('auth');
Route::get('/laporan/beban/pengiriman/pdf', [LaporanController::class, 'PengirimanPDF'])->name('laporan/beban/pengiriman/pdf')->middleware('auth');
// Laporan Barang
Route::get('/laporan/barang', [LaporanController::class, 'BarangIndex'])->name('laporan/barang')->middleware('auth');
Route::get('/laporan/barang/pdf', [LaporanController::class, 'BarangPDF'])->name('laporan/barang/pdf')->middleware('auth');
