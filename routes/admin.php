<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
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

Route::middleware(['web', 'admin.guest'])
    ->prefix('auth')
    ->name('auth.')
    ->controller(AuthController::class)
    ->group(function () {
        Route::get('login', 'index')->name('index');
        Route::post('login', 'login')->name('login');
        Route::post('logout', 'logout')->name('logout');
    });


Route::middleware(['web', 'admin.auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});
