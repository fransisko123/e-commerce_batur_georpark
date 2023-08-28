<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

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
    return view('welcome');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('toko', TokoController::class);

    Route::get('{toko}/produk/list_produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('produk/{toko}/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('produk/{toko}/store', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('produk/{toko}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('produk/{toko}/update/{produk}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('produk/{produk}/delete', [ProdukController::class, 'destroy'])->name('produk.destroy');
});

require __DIR__.'/auth.php';
