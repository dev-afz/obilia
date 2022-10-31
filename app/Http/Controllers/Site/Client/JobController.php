<?php

namespace App\Http\Controllers\Site\Client;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExperienceLevel;
use App\Models\Skill;

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
        return view('site.dashboard.client.create-job', compact('categories', 'skills', 'experience_levels'));
    }
}
