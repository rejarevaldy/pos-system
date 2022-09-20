<?php

use Illuminate\Support\Facades\Route;

// Auth
use App\Http\Controllers\Auth\LoginController;

// Backend
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SupplyController;

// Ajax
use App\Http\Controllers\Ajax\ProductAjax;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'auth', 'middleware' => 'auth', 'as' => 'auth.'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('product', ProductController::class)->names('product');
    Route::post('product/import', [ProductController::class, 'import'])->name('product.import');

    Route::group(['prefix' => 'ajax', 'middleware' => 'auth', 'as' => 'ajax.'], function () {
        Route::get('products', [ProductAjax::class, 'products'])->name('products');
        Route::get('product/{code}', [ProductAjax::class, 'getProductCode'])->name('product.get');
    });

    Route::resource('supply', SupplyController::class)->names('supply');
});



require __DIR__ . '/auth.php';
