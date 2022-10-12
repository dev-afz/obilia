<?php

namespace App\Services\Helpers;

use App\Models\User;

trait OauthHelper
{
    /*
    |--------------------------------------------------------------------------
    | Handle Redirect after login
    |--------------------------------------------------------------------------
    |
    | Check if user is client or user and redirect to respective dashboard
    |
    */

    private function handleRedirect(User $user)
    {
        switch ($user->role) {
            case 'user':
                return redirect()->route('site.user.dashboard');
                break;
            case 'client':
                return redirect()->route('site.client.dashboard');
                break;

            default:
                return redirect()->route('site.index');
                break;
        }
    }
}
