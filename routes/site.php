<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\OauthController;
use App\Http\Controllers\Site\Auth\RegistrationController;

Route::name('site.')
    ->controller(SiteController::class)
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Authentication Routes
        |--------------------------------------------------------------------------
        | These routes are used for authentication and registration.
        |
        */

        Route::post('login', [LoginController::class, 'login'])->name('login');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        Route::post('register', [RegistrationController::class, 'register'])->name('register');

        /*
        |--------------------------------------------------------------------------
        | Site Routes
        |--------------------------------------------------------------------------
        | These routes are used for the site.
        |
        */

        Route::get('/', 'index')->name('index');
        Route::post('like/job', 'toggleJobLike')->name('like.job');
        Route::get('cat/{slug}', 'showSubcategory')->name('show-subcategory');
        Route::get('service/{slug}', 'job')->name('job.show');
        Route::get('search', 'jobSearch')->name('job.search');
        Route::post('send-proposal', 'sendJobProposal')->name('job.proposal');




        /*
        |--------------------------------------------------------------------------
        | OAuth Routes
        |--------------------------------------------------------------------------
        | These routes are used for OAuth.
        |
        */


        Route::prefix('auth')
            ->name('auth.')
            ->controller(OauthController::class)
            ->group(function () {
                Route::get('google', 'redirectToGoogle')->name('google');
                Route::get('google/callback', 'handleGoogleCallback')->name('google.callback');
            });
    });
