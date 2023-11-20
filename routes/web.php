<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukOnOrderController;
use App\Http\Controllers\AlamatCustomerController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\frontend\CartFrontendController;
use App\Http\Controllers\frontend\CustomerAuthController;
use App\Http\Controllers\frontend\TokoFrontendController;
use App\Http\Controllers\frontend\ProdukFrontendController;
use App\Http\Controllers\frontend\ReviewFrontendController;
use App\Http\Controllers\frontend\CheckoutFrontendController;
use App\Http\Controllers\frontend\CustomerFrontendController;
use App\Http\Controllers\frontend\KategoriFrontendController;
use App\Http\Controllers\frontend\DashboardFrontendController;
use App\Http\Controllers\frontend\AlamatCustomerFrontendController;

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

// success payment page
Route::get('/payment_success', function () {
    return view('frontend.payment.success');
});

Route::get('/', function () {
    return view('frontend.tentang_kami');
});

Route::middleware(['customer.guest'])->group(function () {
    Route::get('/customer_login', [CustomerAuthController::class, 'showLoginForm'])->name('customer.login');
    Route::post('/customer_login', [CustomerAuthController::class, 'login'])->name('customer.post_login');
    Route::get('/customer_register', [CustomerAuthController::class, 'showRegistrationForm'])->name('customer.register');
    Route::post('/customer_register', [CustomerAuthController::class, 'register'])->name('customer.post_register');
});

Route::middleware(['auth:customer'])->group(function () {
    Route::post('/customer_logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
});

Route::get('/shop', [DashboardFrontendController::class, 'index'])->name('dashboard_frontend.index');
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
    Route::post('checkOngkir', [CheckoutFrontendController::class, 'checkOngkir'])->name('checkout.checkOngkir');
    Route::post('checkout_pay', [CheckoutFrontendController::class, 'checkout_pay'])->name('checkout.checkout_pay');
    Route::get('/my_account', [CustomerFrontendController::class, 'myAccount'])->name('customer.myAccount');
    Route::get('/my_account/{customer_id}/{no_order}', [CustomerFrontendController::class, 'detail_order'])->name('customer.detail_order');
    Route::get('/tambah_alamat/{customer_id}', [AlamatCustomerFrontendController::class, 'create'])->name('alamat_frontend.create');
    Route::get('/getCitiesFrontend/{provinceId}', [AlamatCustomerFrontendController::class, 'getCitiesFrontend'])->name('alamat_frontend.getCitiesFrontend');
    Route::post('tambah_alamat_proses_frontend/{customer}', [AlamatCustomerFrontendController::class, 'store'])->name('alamat_frontend.store');
    Route::delete('destroy/alamat_frontend/{alamat}', [AlamatCustomerFrontendController::class, 'destroy'])->name('alamat_frontend.destroy');
    Route::put('/my_account/order/{id}/dibatalkan', [CustomerFrontendController::class, 'dibatalkan'])->name('customer.detail_order.dibatalkan');
    Route::put('/my_account/{customer_id}/edit', [CustomerFrontendController::class, 'editProfileProses'])->name('customerFrontend.editProfileProses');

    // payment page
    Route::get('pembayaran/{customer_id}/{payment_id}', [CheckoutFrontendController::class, 'pembayaran_page'])->name('checkout.pembayaran_page');

    // Add Review
    Route::post('review/create', [ReviewFrontendController::class, 'create'])->name('review.create');
    Route::delete('review/{review}/remove', [ReviewFrontendController::class, 'destroy'])->name('review.destroy');
});




// ======================= ADMIN ========================= //

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/admin', function () {
        return redirect()->route('login');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // TOKO
    Route::get('toko', [TokoController::class, 'index'])->name('toko.index');
    Route::get('toko/create', [TokoController::class, 'create'])->name('toko.create')->middleware('admin');
    Route::post('toko', [TokoController::class, 'store'])->name('toko.store')->middleware('admin');
    Route::get('toko/{toko}', [TokoController::class, 'show'])->name('toko.show');
    Route::get('toko/{toko}/edit', [TokoController::class, 'edit'])->name('toko.edit')->middleware('check.toko.ownership');
    Route::put('toko/{toko}', [TokoController::class, 'update'])->name('toko.update')->middleware('check.toko.ownership');
    Route::delete('toko/{toko}', [TokoController::class, 'destroy'])->name('toko.destroy')->middleware('admin');

    Route::resource('kategori_produk', KategoriProdukController::class);

    // Produk
    Route::get('{toko}/produk/list_produk', [ProdukController::class, 'index'])->name('produk.index')->middleware('check.toko.ownership');
    Route::get('produk/{toko}/create', [ProdukController::class, 'create'])->name('produk.create')->middleware('check.toko.ownership');
    Route::post('produk/{toko}/store', [ProdukController::class, 'store'])->name('produk.store')->middleware('check.toko.ownership');
    Route::get('produk/{toko}/edit/{produk}', [ProdukController::class, 'edit'])->name('produk.edit')->middleware('check.toko.ownership');
    Route::put('produk/{toko}/update/{produk}', [ProdukController::class, 'update'])->name('produk.update')->middleware('check.toko.ownership');
    Route::delete('/produk/{id}/delete', [ProdukController::class, 'destroy'])->name('produk.destroy');

    // Laporan produk pada toko
    Route::get('produk_on_order/{toko}', [ProdukOnOrderController::class, 'index'])->name('produk_on_order.index')->middleware('check.toko.ownership');

    Route::resource('customer', CustomerController::class);
    Route::get('{customer}/alamat', [AlamatCustomerController::class, 'index'])->name('alamat_customer.index');
    Route::get('{customer}/tambah_alamat', [AlamatCustomerController::class, 'create'])->name('alamat_customer.create');
    Route::get('/getCities/{provinceId}', [AlamatCustomerController::class, 'getCities'])->name('alamat_customer.getCities');
    Route::post('{customer}/tambah_alamat_proses', [AlamatCustomerController::class, 'store'])->name('alamat_customer.store');
    Route::delete('destroy/alamat/{alamat}', [AlamatCustomerController::class, 'destroy'])->name('alamat_customer.destroy');

    Route::get('order', [OrderController::class, 'index'])->name('order.index');
    // Route::get('order/create', [OrderController::class, 'create'])->name('order.create');
    // Route::post('order/store', [OrderController::class, 'store'])->name('order.store');
    Route::get('order/{id}/detail', [OrderController::class, 'detail'])->name('order.detail');
    Route::put('order/{id}/dibatalkan', [OrderController::class, 'dibatalkan'])->name('order.dibatalkan');
    Route::put('order/{id}/dikirim', [OrderController::class, 'dikirim'])->name('order.dikirim');
    Route::put('order/{id}/selesai', [OrderController::class, 'selesai'])->name('order.selesai');
    Route::delete('order/{id}/delete', [OrderController::class, 'destroy'])->name('order.destroy');

    Route::get('payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::delete('payment/{id}/delete', [PaymentController::class, 'destroy'])->name('payment.destroy');
});

require __DIR__.'/auth.php';
