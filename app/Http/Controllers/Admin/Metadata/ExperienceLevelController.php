<?php

namespace App\Http\Controllers\Admin\Metadata;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ExperienceLevel;
use App\Http\Controllers\Controller;

class ExperienceLevelController extends Controller
{


    public function index()
    {
        return view('content.tables.metadata.experience-levels');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $experienceLevel = ExperienceLevel::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return response()->json([
            'header' => 'Created!!',
            'message' => 'Experience level created successfully',
            'refresh_table' => true,
            'close_canvas' => 'addCanvas',
        ]);
    }
}
