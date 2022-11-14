<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {

        $latest_jobs = Job::active()
            ->with(['client:id,name', 'skills' => ['skill:id,name']])
            ->when(auth()->check(), function ($query) {
                $query->withCount(['likes' => function ($query) {
                    $query->where('user_id', auth()->id());
                }]);
            })
            ->latest()
            ->take(6)
            ->get();

        $categories = Category::active()
            ->get();

        return view('site.index', compact('latest_jobs', 'categories'));
    }


    public function showSubcategory($slug)
    {
        $category = Category::active()
            ->where('slug', $slug)
            ->firstOrFail();

        $subcategories = SubCategory::active()
            ->where('category_id', $category->id)
            ->get();

        return view('site.subcategories', compact('category', 'subcategories'));
    }


    public function toggleJobLike(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:jobs,id'
        ]);



        $job = Job::findOrFail($request->id);
        $user = auth()->user();
        $liked = $user->liked_jobs()->where('likeable_id', $job->id)->exists();

        if ($liked) {
            $user->unlikeJob($job->id);
        } else {
            $user->likeJob($job->id);
        }

        return response()->json([
            'status' => 'success',
            'message' => $liked ? 'Job unliked' : 'Job liked',
        ]);
    }



    public function job($slug)
    {
        $job = Job::active()
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
            ->where('slug', $slug)
            ->firstOrFail();
        return view('site.job-details', compact('job'));
    }
}
