<?php

use App\Http\Controllers\Site\Client\DashboardController;
use Illuminate\Support\Facades\Route;



Route::name('site.')
    ->controller(SiteController::class)
    ->group(function () {

        Route::prefix('client')
            ->name('client.')
            ->controller(DashboardController::class)
            ->middleware(['auth.client', 'auth'])
            ->group(function () {
                Route::get('/', 'dashboard')->name('dashboard');
            });
    });
