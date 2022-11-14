<?php

namespace App\Http\Controllers\Site\Client;

use App\Action\Client\ClientJobAction;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExperienceLevel;
use App\Models\Skill;
use App\Models\WorkLength;

class JobController extends Controller
{
    public function index()
    {

        $user = auth()->user();

        $jobs =  $user->posted_jobs;


        return view('site.dashboard.client.jobs', compact('jobs'));
    }

    public function create()
    {

        $categories = Category::active()->get();
        $skills = Skill::active()->get();
        $experience_levels = ExperienceLevel::active()->get();
        $length = WorkLength::active()->get();
        return view('site.dashboard.client.create-job', compact(
            'categories',
            'skills',
            'experience_levels',
            'length'
        ));
    }

    public function store(Request $request, ClientJobAction $action)
    {

        $request->validate([
            'job_title' => 'required',
            'job_description' => 'required|string|max:5000',
            'industry' => 'required|exists:categories,id',
            'category' => 'required|exists:sub_categories,id',
            'experience' => 'required|exists:experience_levels,id',
            'skills' => 'required|array',
            'payment_type' => 'required|in:hourly,fixed',
            'from' => 'required|numeric',
            'to' => 'required|numeric',
            'project_length' => 'required|exists:work_lengths,id',
            'project_size' => 'required|string|in:small,medium,large',
            'total_hours' => 'required|numeric',
        ]);
        $user = auth()->user();
        $action->jobStoreAction($request, $user);

        return response()->json([
            'message' => 'Job created successfully'
        ]);
    }


    public function details($slug)
    {
        $job = auth()->user()->posted_jobs()
            ->with([
                'client:id,name',
                'skills' => ['skill:id,name'],
                'sub_category:id,name',
                'experience:id,name,slug',
                'work_length:id,name,slug',
            ])
            ->when(auth()->check(), function ($query) {
                $query->withCount(['likes' => function ($query) {
                    $query->where('user_id', auth()->id());
                }]);
            })
            ->where('slug', $slug)->firstOrFail();
        return view('site.dashboard.client.job-details', compact('job'));
    }
}
