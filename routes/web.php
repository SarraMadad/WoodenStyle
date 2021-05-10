<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionsController;
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

// REGISTER
Route::get('/register', [RegistrationController::class, 'create'])->name('client.register.create');

Route::post('/register', [RegistrationController::class, 'store'])->name('client.register.store');

// LOGIN
Route::get('/login', [SessionsController::class, 'create'])->name('client.login.create');

Route::post('/login', [SessionsController::class, 'store'])->name('client.login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])->name('client.login.destroy');


Route::get('/category/{category_id}/products', [CategoryController::class, 'associateProducts'])->name('client.product');


Route::get('{user_id}/command', [CommandController::class, 'indexUserCommand'])->name('client.command');

Route::post('/command', [CommandController::class, 'store'])->name('client.command.store');

Route::get('{user_id}/basket', [BasketController::class, 'show'])->name('client.basket.show');

Route::post('{user_id}/basket/add', [BasketController::class, 'addProduct'])->name('client.basket.add');

Route::post('{user_id}/basket/remove', [BasketController::class, 'removeproduct'])->name('client.basket.remove');




