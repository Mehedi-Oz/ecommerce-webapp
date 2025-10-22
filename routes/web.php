<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EcommerceAppController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Routes

// EcommerceAppController
Route::get('/', [EcommerceAppController::class, 'index'])->name('home');
Route::get('/product/category', [EcommerceAppController::class, 'category'])->name('product.category');
Route::get('/product/detail', [EcommerceAppController::class, 'detail'])->name('product.detail');

// CartController
Route::get('/cart/show', [CartController::class, 'index'])->name('cart.show');

// CheckoutController
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile - ProfileController
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //CategoryController
    Route::get('/category/add', [CategoryController::class, 'index'])->name('category.add');
    Route::get('/category/manage', [CategoryController::class, 'manage'])->name('category.manage');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
});

require __DIR__ . '/auth.php';
