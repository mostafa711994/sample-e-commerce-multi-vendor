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



Route::get('/login', [\App\Http\Controllers\LoginController::class, 'storeLogin'])->name('store.login');
Route::post('/doLogin', [\App\Http\Controllers\LoginController::class, 'storeDoLogin'])->name('store.do.login');

Route::group(['middleware' => ['auth:stores']], function() {
    Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'storeLogout'])->name('store.logout');

    Route::get('/', [\App\Http\Controllers\Store\StoreController::class, 'index'])->name('store.index');
    Route::get('/products', [\App\Http\Controllers\Store\StoreController::class, 'products'])->name('products.index');
    Route::post('/products/store', [\App\Http\Controllers\Store\StoreController::class, 'storeProduct'])->name('products.store');

});
