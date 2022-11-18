<?php

namespace App\Http\Controllers\Site\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {

        $user = auth()->user();

        $jobs = $user->job_applications()->with(['job'])->paginate(10);

        return view('site.dashboard.user.applied-jobs', compact('jobs'));
    }


    public function applicationDetails($id)
    {
        $user = auth()->user();

        return $job = $user->job_applications()->with(['job'])->findOrFail($id);
    }


    public function invitations()
    {
        $user = auth()->user();

        $invitations = $user->job_invitations()->with(['job'])->paginate(10);

        return view('site.dashboard.user.job-invitations', compact('invitations'));
    }
}
