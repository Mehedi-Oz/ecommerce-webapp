<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\EcommerceAppController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [EcommerceAppController::class, 'index'])->name('home');
Route::get('/product/category', [EcommerceAppController::class, 'category'])->name('product.category');
Route::get('/product/detail', [EcommerceAppController::class, 'detail'])->name('product.detail');
Route::get('/cart/show', [CartController::class, 'index'])->name('cart.show');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';