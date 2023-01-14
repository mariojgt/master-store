<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\MasterStore\Controllers\BrandController;
use Mariojgt\MasterStore\Controllers\ProductController;
use Mariojgt\MasterStore\Controllers\CategoryController;

// Standard
Route::group([
    'middleware' => ['web'],
], function () {
    // Add your normal routes in here
    //Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Auth Route
Route::group([
    'middleware' => ['skeleton_admin', '2fa:skeleton_admin'],
    'prefix'     => config('skeleton.route_prefix'),
], function () {

    Route::controller(BrandController::class)->group(function () {
        Route::get('master-store/brand/index', 'index')->name('master-store.brand.index');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('master-store/category/index', 'index')->name('master-store.category.index');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('master-store/product/index', 'index')->name('master-store.product.index');
    });
});
