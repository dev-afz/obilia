<?php

namespace App\Http\Controllers\Site\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($request->only('email', 'password'), true)) {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials are incorrect.',
            ]);
        }


        switch ($request->user()->role) {
            case 'user':
                $redirect = route('site.user.dashboard');
                break;
            case 'client':
                $redirect = route('site.client.dashboard');
                break;
            default:
                $redirect = route('site.index');
                break;
        }


        return response()->json([
            'header' => 'Success!!',
            'message' => 'Logged in successfully',
            'redirect' => $redirect,
        ]);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json([
            'header' => 'Success!!',
            'message' => 'Logged out successfully',
        ]);
    }
}
