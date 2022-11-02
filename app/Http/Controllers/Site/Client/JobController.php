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
        return view('site.dashboard.client.jobs');
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

        // $data = [];
        // foreach ($request->skills as $key => $value) {
        //     if (str_contains($value, 'new_skill_')) {
        //         $data[] = 'new';
        //     } else {
        //         $data[] = 'old';
        //     }
        // }

        // return $data;


        $action->jobStoreAction($request);

        return response()->json([
            'message' => 'Job created successfully'
        ]);
    }
}
