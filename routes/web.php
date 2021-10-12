<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cart', [\App\Http\Controllers\HomeController::class, 'cart'])->name('cart');
Route::post('/login', [\App\Http\Controllers\web\AuthController::class, 'login'])->name('user.login');
Route::post('/register', [\App\Http\Controllers\web\AuthController::class, 'register'])->name('user.register');
