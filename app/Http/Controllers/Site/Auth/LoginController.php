<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        return $request->all();
    }
}
