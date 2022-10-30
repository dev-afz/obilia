<?php

namespace App\Http\Controllers\Site\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function register(Request $request, UserService $userService)
    {
        $request->validate([
            'role' => 'required|in:user,client',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        return $userService->registrationService($request);
    }
}
