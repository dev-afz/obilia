<?php

namespace App\Http\Controllers\Site\Client;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {


        $activeJobs = auth()->user()->posted_jobs()->where('status', 'active')->count();
        $completedJobs = auth()->user()->posted_jobs()->where('status', 'completed')->count();
        $cancelledJobs = auth()->user()->posted_jobs()->where('status', 'cancelled')->count();
        $totalJobs = auth()->user()->posted_jobs()->count();

        return view('site.dashboard.client.index', compact(
            'activeJobs',
            'completedJobs',
            'cancelledJobs',
            'totalJobs'
        ));
    }


    public function subcategories(Request $request)
    {
        //allow only ajax requests
        if (!$request->ajax()) {
            abort(404);
        }

        $request->validate([
            'category' => 'required|exists:categories,id'
        ]);

        $subcategories = SubCategory::where('category_id', $request->category)->get(['id', 'name']);

        return response()->json($subcategories);
    }


    public function profile()
    {
        return view('site.dashboard.client.profile');
    }
}
