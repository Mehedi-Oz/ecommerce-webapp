<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EcommerceAppController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubcategoryController;
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
    Route::prefix('category')->group(function () {
        Route::get('/add', [CategoryController::class, 'index'])->name('category.add');
        Route::get('/manage', [CategoryController::class, 'manage'])->name('category.manage');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/is_active/{id}', [CategoryController::class, 'is_active'])->name('category.is_active');
        Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    //SubcategoryController
    Route::prefix('subcategory')->group(function () {
        Route::get('/add', [SubcategoryController::class, 'index'])->name('subcategory.add');
        Route::get('/manage', [SubcategoryController::class, 'manage'])->name('subcategory.manage');
        Route::post('/store', [SubcategoryController::class, 'store'])->name('subcategory.store');
        Route::get('/edit/{id}', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
        Route::put('/update/{id}', [SubcategoryController::class, 'update'])->name('subcategory.update');
        Route::get('/is_active/{id}', [SubcategoryController::class, 'is_active'])->name('subcategory.is_active');
        Route::delete('/destroy/{id}', [SubcategoryController::class, 'destroy'])->name('subcategory.destroy');
    });
});

require __DIR__ . '/auth.php';
