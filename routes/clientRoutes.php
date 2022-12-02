<?php

use App\Http\Controllers\Site\Client\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\Client\JobController;
use App\Http\Controllers\Site\Client\DashboardController;



Route::name('site.')
    ->group(function () {

        Route::prefix('client')
            ->name('client.')
            ->controller(DashboardController::class)
            ->middleware(['auth.client', 'auth'])
            ->group(function () {
                Route::get('/', 'dashboard')->name('dashboard');
                Route::get('profile', 'profile')->name('profile');
                Route::get('subcategories', 'subcategories')->name('subcategories');
                Route::prefix('jobs')
                    ->name('jobs.')
                    ->controller(JobController::class)
                    ->group(function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('/applications', 'applications')->name('applications');
                        Route::post('/application-action', 'applicationAction')->name('application-action');
                        Route::post('/invite-candidate', 'inviteCandidate')->name('invite-candidate');
                        Route::get('/invited-candidates', 'invitedCandidates')->name('invited-candidates');
                        Route::get('/hired-candidates', 'hiredCandidates')->name('hired-candidates');
                        Route::get('/suggested-candidates', 'suggestedCandidates')->name('suggested-candidates');
                        Route::get('/{slug}/details', 'details')->name('details');
                        Route::get('create', 'create')->name('create');
                        Route::post('store', 'store')->name('store');
                    });

                Route::prefix('chats')
                    ->name('chats.')
                    ->controller(ChatController::class)
                    ->group(function () {
                        Route::get('/', 'index')->name('index');
                    });
            });
    });
