<?php

use App\Http\Controllers\CommandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::domain('backoffice.woodenstyle.test')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('category', CategoryController::class);

    Route::resource('product', ProductController::class);

    Route::resource('user', UserController::class);

    Route::resource('command', CommandController::class);

});

Route::domain('woodenstyle.test')->group(function () {

    Route::get('/', [ProductController::class, 'indexClient'])->name('client.index');

    Route::get('/category/{category_id}/products', [CategoryController::class, 'associateProducts'])->name('client.product');

});
