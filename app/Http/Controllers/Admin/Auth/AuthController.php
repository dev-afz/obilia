<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {

        return view('auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // dd($request->all(), $request->only('email', 'password'), Auth::guard('admin'));

        // return  Hash::make($request->password);


        //authenticate using admin guard without using attempt
        // $admin = Admin::where('email', $request->email)->first();
        // if ($admin && Hash::check($request->password, $admin->password)) {
        //     Auth::guard('admin')->login($admin);
        //     return redirect()->route('admin.dashboard');
        // }



        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect()->route('admin.dashboard');
        }

        return back()->with('status', 'Invalid login details');
    }

    public function logout(Request $request)
    {
        dd($request);
    }
}
