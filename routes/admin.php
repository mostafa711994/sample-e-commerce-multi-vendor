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



Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('admin.login');
Route::post('/doLogin', [\App\Http\Controllers\LoginController::class, 'doLogin'])->name('do.login');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('admin.logout');

    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.index');
    Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::post('/users/store', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
    Route::post('/users/update/{user}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
    Route::get('/users/delete/{user}', [\App\Http\Controllers\Admin\UserController::class, 'delete'])->name('users.delete');
    Route::get('/userStores', [\App\Http\Controllers\Admin\StoresController::class, 'index'])->name('stores.index');
    Route::post('/userStores/store', [\App\Http\Controllers\Admin\StoresController::class, 'store'])->name('stores.store');
    Route::post('/userStores/update/{user}', [\App\Http\Controllers\Admin\StoresController::class, 'update'])->name('stores.update');
    Route::get('/userStores/delete/{user}', [\App\Http\Controllers\Admin\StoresController::class, 'delete'])->name('stores.delete');

});
