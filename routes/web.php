<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserTransactionController;

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

// Halaman Beranda
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');



// Grup route untuk admin dengan middleware auth
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('user', UserController::class);
    Route::resource('transactions', TransactionController::class);
    Route::patch('transactions/{transaction}/status', [TransactionController::class, 'updateStatus'])->name('transactions.updateStatus');
});

// Route yang tidak termasuk dalam grup tetapi membutuhkan auth, tetap bisa diberi middleware
Route::middleware('auth')->group(function () {
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    // Rute untuk menampilkan halaman checkout langsung
    Route::get('/checkout', [KeranjangController::class, 'showCheckout'])->name('checkout.langsung');

    // Rute untuk mengarahkan ke halaman checkout langsung dengan data produk
    Route::post('/checkout', [KeranjangController::class, 'checkoutLangsung'])->name('checkout.langsung');
    Route::get('/pembayaran', [KeranjangController::class,'prosesCheckout'])->name('pembayaran');

    // Route untuk checkout keranjang
    Route::get('/checkoutKeranjang', [KeranjangController::class, 'checkout'])->name('checkout');
    Route::post('/checkoutKeranjang', [KeranjangController::class, 'checkout'])->name('checkout');

    // Rute untuk memproses pembayaran setelah checkout
    Route::post('/checkout/proses', [KeranjangController::class, 'prosesCheckout'])->name('checkout.proses');
    Route::get('/riwayat', [UserTransactionController::class, 'index'])->name('user.transactions.index');
    // Route untuk halaman admin menggunakan view statis (jika masih diperlukan)
//     Route::get('/admin', [ProductController::class, 'index'])->name('admin.products.index');
});
Route::middleware('auth')->group(function () {
    // keranjang
    Route::get('/keranjang', [KeranjangController::class, 'keranjang'])->name('keranjang');
    // Rute untuk menghapus item dari keranjang
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'hapus'])->name('keranjang.hapus');
    // untuk keranjang product
    Route::post('/keranjang/tambah', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
});
// Rute untuk menampilkan formulir registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Rute untuk memproses data registrasi
Route::post('/register', [RegisterController::class, 'register']);

// Menampilkan form login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Proses login
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// Rute khusus untuk admin dengan middleware 'admin'
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    // Rute admin lainnya
});
