<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| USER CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProdukController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\AboutController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\InvoiceController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\User\KemitraanController;
use App\Http\Controllers\Admin\KemitraanController as AdminKemitraanController;



Route::get('/invoice/{id}', [InvoiceController::class, 'show']);
/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\ProdukController as AdminProdukController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TransaksiController;

/*
|--------------------------------------------------------------------------
| USER ROUTE
|--------------------------------------------------------------------------
*/
// ROUTE SEMENTARA CEK CART
Route::get('/clear-cart', function () {

    session()->forget('cart');

    return 'Cart cleared';
});

Route::get('/pesanan', [CheckoutController::class, 'pesanan']);

Route::post('/cart/update/{id}', [CartController::class, 'update']);
Route::post('/cart/remove/{id}', [CartController::class, 'remove']);

Route::post('/cart/increase/{id}', [CartController::class, 'increase']);
Route::post('/cart/decrease/{id}', [CartController::class, 'decrease']);

Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);

Route::get('/checkout', [CheckoutController::class, 'index']);

Route::get('/transaksi', [TransaksiController::class, 'index']);

Route::get('/transaksi/konfirmasi/{id}', [TransaksiController::class, 'konfirmasi']);
Route::get('/', [HomeController::class, 'index']);

Route::get('/produk', [ProdukController::class, 'index']);

Route::get('/produk/{id}', [ProdukController::class, 'show']);

Route::post('/cart/add', [CartController::class, 'add']);

Route::get('/cart', [CartController::class, 'index']);

Route::get('/checkout', [CheckoutController::class, 'index']);

Route::post('/checkout/process', [CheckoutController::class, 'process']);

Route::get('/kemitraan', [KemitraanController::class, 'index']);

Route::post('/kemitraan/store', [KemitraanController::class, 'store']);

Route::get('/pesanan', [CheckoutController::class, 'pesanan']);


// Route::view('/about', 'user.about');

// Route::view('/contact', 'user.contact');


/*
|--------------------------------------------------------------------------
| ADMIN ROUTE
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\AdminController;



Route::get('/admin/pesanan', [TransaksiController::class, 'pesanan']);
Route::post('/admin/pesanan/status/{id}', [TransaksiController::class, 'updateStatus']);
Route::post('/admin/transaksi/{id}/tolak', [TransaksiController::class, 'tolak']);
Route::post('/transaksi/pengiriman/{id}', [TransaksiController::class, 'updatePengiriman']);
Route::prefix('admin')->group(function () {

Route::get('/produk', [ProdukController::class, 'index']);

    // LOGIN
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'authenticate']);

    // LOGOUT
    Route::post('/logout', [AuthController::class, 'logout']);

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // PRODUK
    Route::get('/produk', [AdminProdukController::class, 'index']);

    Route::get('/produk/create', [AdminProdukController::class, 'create']);

    Route::post('/produk/store', [AdminProdukController::class, 'store']);

    // EDIT
    Route::get('/produk/edit/{id}', [AdminProdukController::class, 'edit']);

    Route::post('/produk/update/{id}', [AdminProdukController::class, 'update']);

    // DELETE
    Route::get('/produk/delete/{id}', [AdminProdukController::class, 'destroy']);

    Route::get('/admin/transaksi', [TransaksiController::class, 'index']);

    Route::get('/cart/addqty/{id}', [CartController::class, 'addQty']);
Route::get('/cart/min/{id}', [CartController::class, 'minQty']);

Route::get('/transaksi', [TransaksiController::class, 'index']);

Route::get('/transaksi/konfirmasi/{id}', [TransaksiController::class, 'konfirmasi']);

Route::get('/transaksi/proses/{id}', [TransaksiController::class, 'proses']);
Route::get('/transaksi/kirim/{id}', [TransaksiController::class, 'kirim']);
Route::get('/transaksi/selesai/{id}', [TransaksiController::class, 'selesai']);

Route::get('/admin/transaksi', [TransaksiController::class, 'index']);

Route::post('/admin/transaksi/konfirmasi/{id}', [TransaksiController::class, 'konfirmasi']);

Route::post('/admin/transaksi/kirim/{id}', [TransaksiController::class, 'kirim']);

Route::post('/admin/transaksi/selesai/{id}', [TransaksiController::class, 'selesai']);

Route::get('/invoice/{id}', [CheckoutController::class, 'invoice']);

Route::post('/admin/transaksi/{id}/tolak', [TransaksiController::class, 'tolak']);


    Route::get('/customer', [CustomerController::class, 'index']);
    Route::get('/customer/{id}', [CustomerController::class, 'show']);

/*
|--------------------------------------------------------------------------
| KEMITRAAN ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/kemitraan', [AdminKemitraanController::class, 'index']);

Route::get('/kemitraan/konfirmasi/{id}', [AdminKemitraanController::class, 'konfirmasi']);

Route::get('/kemitraan/tolak/{id}', [AdminKemitraanController::class, 'tolak']);
});

Route::prefix('admin')->group(function () {

    Route::get('/profile', [AdminController::class, 'profile']);

    Route::get('/pengaturan', [AdminController::class, 'pengaturan']);

    Route::post('/logout', [AdminController::class, 'logout']);

});

/*
|--------------------------------------------------------------------------
| LAPORAN ADMIN
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    Route::post('/transaksi/resi/{id}', [TransaksiController::class, 'updateResi']);

    // LAPORAN
    Route::get('/laporan', [LaporanController::class, 'index']);

    // EXPORT PDF
    Route::get('/laporan/pdf', [LaporanController::class, 'exportPdf']);

    // INVOICE PDF
    Route::get('/laporan/invoice/{id}', [LaporanController::class, 'invoicePdf']);

});

