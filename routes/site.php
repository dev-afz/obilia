<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\OauthController;
use App\Http\Controllers\Site\Auth\RegistrationController;

Route::name('site.')
    ->controller(SiteController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('login', [LoginController::class, 'login'])->name('login');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        Route::post('register', [RegistrationController::class, 'register'])->name('register');


        Route::prefix('auth')
            ->name('auth.')
            ->controller(OauthController::class)
            ->group(function () {
                Route::get('google', 'redirectToGoogle')->name('google');
                Route::get('google/callback', 'handleGoogleCallback')->name('google.callback');
            });
    });
