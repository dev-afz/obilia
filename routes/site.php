<?php

use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;


Route::name('site.')
    ->controller(SiteController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');

        Route::post('login', [LoginController::class, 'login'])->name('login');
    });
