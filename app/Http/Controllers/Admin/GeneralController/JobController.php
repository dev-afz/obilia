<?php

namespace App\Http\Controllers\Admin\GeneralController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('content.tables.job.job');
    }
}
