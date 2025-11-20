<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EcommerceAppController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

// Public Routes

// EcommerceAppController
Route::get('/', [EcommerceAppController::class, 'index'])->name('home');
Route::get('/product/category/{id}', [EcommerceAppController::class, 'category'])->name('product.category');
Route::get('/product/detail/{id}', [EcommerceAppController::class, 'detail'])->name('product.detail');

// CartController
Route::get('/cart/show', [CartController::class, 'index'])->name('cart.show');
Route::post('/cart/store/{id}', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart/update/{rowId}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{rowId}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// CheckoutController
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/cash-on-delivery', [CheckoutController::class, 'cashOnDelivery'])->name('cash-on-delivery');
Route::get('/checkout/order-complete', [CheckoutController::class, 'orderComplete'])->name('order-complete');

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile - ProfileController
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CategoryController
    Route::prefix('category')->group(function () {
        Route::get('/add', [CategoryController::class, 'index'])->name('category.add');
        Route::get('/manage', [CategoryController::class, 'manage'])->name('category.manage');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/is_active/{id}', [CategoryController::class, 'is_active'])->name('category.is_active');
        Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    // SubcategoryController
    Route::prefix('subcategory')->group(function () {
        Route::get('/add', [SubcategoryController::class, 'index'])->name('subcategory.add');
        Route::get('/manage', [SubcategoryController::class, 'manage'])->name('subcategory.manage');
        Route::post('/store', [SubcategoryController::class, 'store'])->name('subcategory.store');
        Route::get('/edit/{id}', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
        Route::put('/update/{id}', [SubcategoryController::class, 'update'])->name('subcategory.update');
        Route::get('/is_active/{id}', [SubcategoryController::class, 'is_active'])->name('subcategory.is_active');
        Route::delete('/destroy/{id}', [SubcategoryController::class, 'destroy'])->name('subcategory.destroy');
    });

    // BrandController
    Route::prefix('brand')->group(function () {
        Route::get('/add', [BrandController::class, 'index'])->name('brand.add');
        Route::get('/manage', [BrandController::class, 'manage'])->name('brand.manage');
        Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::put('/update/{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::get('/is_active/{id}', [BrandController::class, 'is_active'])->name('brand.is_active');
        Route::delete('/destroy/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
    });

    // UnitController
    Route::prefix('unit')->group(function () {
        Route::get('/add', [UnitController::class, 'index'])->name('unit.add');
        Route::get('/manage', [UnitController::class, 'manage'])->name('unit.manage');
        Route::post('/store', [UnitController::class, 'store'])->name('unit.store');
        Route::get('/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
        Route::put('/update/{id}', [UnitController::class, 'update'])->name('unit.update');
        Route::get('/is_active/{id}', [UnitController::class, 'is_active'])->name('unit.is_active');
        Route::delete('/destroy/{id}', [UnitController::class, 'destroy'])->name('unit.destroy');
    });

    // ProductController
    Route::prefix('product')->group(function () {
        Route::get('/add', [ProductController::class, 'index'])->name('product.add');
        Route::get('/get-subcategory-by-category', [ProductController::class, 'getSubcategoryByCategory'])->name('product.get-subcategory-by-category');
        Route::get('/manage', [ProductController::class, 'manage'])->name('product.manage');
        Route::get('/details/{id}', [ProductController::class, 'details'])->name('product.details');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/is_active/{id}', [ProductController::class, 'is_active'])->name('product.is_active');
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    });
});

require __DIR__ . '/auth.php';
