<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;
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

Route::prefix('backoffice')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('category', CategoryController::class);

    Route::resource('product', ProductController::class);

    Route::resource('user', UserController::class);

    Route::resource('command', CommandController::class);

});

Route::get('/', [ProductController::class, 'indexClient'])->name('client.index');

Route::get('/register', [AuthController::class, 'indexClient'])->name('client.register');

Route::get('/login', [AuthController::class, 'indexClient'])->name('client.login');

Route::get('/category/{category_id}/products', [CategoryController::class, 'associateProducts'])->name('client.product');

Route::get('{user_id}/command', [CommandController::class, 'indexUserCommand'])->name('client.command');

Route::get('{user_id}/basket', [BasketController::class, 'indexUserBasket'])->name('client.basket.index');

