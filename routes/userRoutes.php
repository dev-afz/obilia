<?php

use App\Http\Controllers\Site\User\DashboardController;
use App\Http\Controllers\Site\User\JobController;
use Illuminate\Support\Facades\Route;


Route::name('site.')
    ->controller(SiteController::class)
    ->group(function () {

        Route::prefix('user')
            ->name('user.')
            ->controller(DashboardController::class)
            ->middleware(['auth.user', 'auth'])
            ->group(function () {
                Route::get('/', 'dashboard')->name('dashboard');

                Route::prefix('jobs')
                    ->name('jobs.')
                    ->controller(JobController::class)
                    ->group(function () {
                        Route::get('/', 'index')->name('index');
                    });
            });
    });
