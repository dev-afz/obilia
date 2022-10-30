<?php

namespace App\Http\Controllers\Admin\Metadata;

use App\Models\Skill;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    public function index()
    {
        return view('content.tables.metadata.skills');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $skill = Skill::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return response()->json([
            'header' => 'Created!!',
            'message' => 'Skill created successfully',
            'refresh_table' => true,
            'close_canvas' => 'addCanvas',
        ]);
    }
}
