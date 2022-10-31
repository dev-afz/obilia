<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\Client\JobController;
use App\Http\Controllers\Site\Client\DashboardController;



Route::name('site.')
    ->controller(SiteController::class)
    ->group(function () {

        Route::prefix('client')
            ->name('client.')
            ->controller(DashboardController::class)
            ->middleware(['auth.client', 'auth'])
            ->group(function () {
                Route::get('/', 'dashboard')->name('dashboard');
                Route::get('subcategories', 'subcategories')->name('subcategories');
                Route::prefix('jobs')
                    ->name('jobs.')
                    ->controller(JobController::class)
                    ->group(function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('create', 'create')->name('create');
                        Route::post('store', 'store')->name('store');
                    });
            });
    });
