<?php

namespace App\Http\Controllers\Site\Client;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('site.dashboard.client.index');
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
}
