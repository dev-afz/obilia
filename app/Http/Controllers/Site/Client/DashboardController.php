<?php

namespace App\Http\Controllers\Site\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('site.dashboard.client.index');
    }
}
