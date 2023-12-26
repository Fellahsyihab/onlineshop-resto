<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Middleware for 'admin' and 'superadmin' roles
Route::middleware(['auth', 'role:admin,superadmin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Consider whether you need both product-cards routes or not
    Route::get('/product-cards', [ProductCardController::class, 'index'])->name('product-cards.index');

    // Middleware for 'superadmin' role
    Route::middleware(['role:superadmin'])->group(function () {
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/forms', [HomeController::class, 'showProductForms'])->name('forms');
        Route::get('/product-cards', [ProductCardController::class, 'index'])->name('product-cards.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // Ganti dengan URL halaman login Anda
})->name('logout');

