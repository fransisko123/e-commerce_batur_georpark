<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlamatCustomerController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\frontend\CartFrontendController;
use App\Http\Controllers\frontend\CustomerAuthController;
use App\Http\Controllers\frontend\TokoFrontendController;
use App\Http\Controllers\frontend\ProdukFrontendController;
use App\Http\Controllers\frontend\CheckoutFrontendController;
use App\Http\Controllers\frontend\CustomerFrontendController;
use App\Http\Controllers\frontend\KategoriFrontendController;
use App\Http\Controllers\frontend\DashboardFrontendController;

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

Route::middleware(['customer.guest'])->group(function () {
    Route::get('/customer_login', [CustomerAuthController::class, 'showLoginForm'])->name('customer.login');
    Route::post('/customer_login', [CustomerAuthController::class, 'login'])->name('customer.post_login');
    Route::get('/customer_register', [CustomerAuthController::class, 'showRegistrationForm'])->name('customer.register');
    Route::post('/customer_register', [CustomerAuthController::class, 'register'])->name('customer.post_register');
});

Route::middleware(['auth:customer'])->group(function () {
    Route::post('/customer_logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
});

Route::get('/', [DashboardFrontendController::class, 'index'])->name('dashboard_frontend.index');
Route::get('/{kategori_slug}/kategori_list_produk', [KategoriFrontendController::class, 'shop'])->name('kategori.shop');
Route::get('/{toko_slug}/toko_list_produk', [TokoFrontendController::class, 'shop'])->name('toko.shop');

Route::get('/{produk_slug}/detail_produk', [ProdukFrontendController::class, 'detail'])->name('produk.detail');

Route::middleware(['customer.auth'])->group(function () {
    Route::get('shopping_cart', [CartFrontendController::class, 'shopping_cart'])->name('cart.shopping_cart');
    Route::post('/cart/add', [CartFrontendController::class, 'addToCart'])->name('cart.addToCart');
    Route::post('/cart/add_from_form', [CartFrontendController::class, 'addToFormCart'])->name('cart.addToFormCart');
    Route::post('/cart/update', [CartFrontendController::class, 'updateCart'])->name('cart.updateCart');
    Route::delete('/cart/remove/{cartItem}', [CartFrontendController::class, 'removeFromCart'])->name('cart.removeFromCart');
    Route::get('checkout', [CheckoutFrontendController::class, 'cartToCheckout'])->name('checkout.cartToCheckout');
    Route::post('checkout_pay', [CheckoutFrontendController::class, 'checkout_pay'])->name('checkout.checkout_pay');
    Route::get('/my_account', [CustomerFrontendController::class, 'myAccount'])->name('customer.myAccount');
    Route::get('/my_account/{customer_id}/{no_order}', [CustomerFrontendController::class, 'detail_order'])->name('customer.detail_order');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/admin', function () {
        return redirect()->route('login');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('toko', TokoController::class);
    Route::resource('kategori_produk', KategoriProdukController::class);

    Route::get('{toko}/produk/list_produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('produk/{toko}/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('produk/{toko}/store', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('produk/{toko}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('produk/{toko}/update/{produk}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('produk/{produk}/delete', [ProdukController::class, 'destroy'])->name('produk.destroy');

    Route::resource('customer', CustomerController::class);
    Route::get('{customer}/alamat', [AlamatCustomerController::class, 'index'])->name('alamat_customer.index');
    Route::get('{customer}/tambah_alamat', [AlamatCustomerController::class, 'create'])->name('alamat_customer.create');
    Route::post('{customer}/tambah_alamat_proses', [AlamatCustomerController::class, 'store'])->name('alamat_customer.store');
});

require __DIR__.'/auth.php';
