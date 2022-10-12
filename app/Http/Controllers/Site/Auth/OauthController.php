<?php

namespace App\Http\Controllers\Site\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\OauthService;
use Laravel\Socialite\Facades\Socialite;

class OauthController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback(Request $request, OauthService $oauthService)
    {
        return $oauthService->handleGoogleCallback($request);
    }
}
