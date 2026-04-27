<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Public Routes (Page for the general public)
|--------------------------------------------------------------------------
*/

// Homepage - Showing the complete restaurant catalog.
Route::get('/', [RestaurantController::class, 'index'])->name('home');

// Restaurant Detail Page - Showing restaurant information by ID
Route::get('/restaurant/{id}', [RestaurantController::class, 'show'])->name('restaurant.detail');


/*
|--------------------------------------------------------------------------
| Admin Routes (Page for the backend system.)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    // Main Dashboard Page
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Category Management Page (CRUD)
    Route::get('/categories', [AdminController::class, 'categories'])->name('admin.categories');
    
    // Restaurant Management Page (CRUD)
    Route::get('/restaurants', [AdminController::class, 'restaurants'])->name('admin.restaurants');

    // 🟢 2 เส้นทางใหม่ที่เพิ่มเข้ามาสำหรับระบบ CRUD หมวดหมู่
    Route::post('/categories/store', [AdminController::class, 'storeCategory'])->name('admin.categories.store');
    Route::delete('/categories/{id}', [AdminController::class, 'deleteCategory'])->name('admin.categories.destroy');

    // 🟡 2 เส้นทางใหม่สำหรับระบบแก้ไขหมวดหมู่
    Route::get('/categories/{id}/edit', [AdminController::class, 'editCategory'])->name('admin.categories.edit');
    Route::put('/categories/{id}', [AdminController::class, 'updateCategory'])->name('admin.categories.update');
});
