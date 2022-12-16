<?php

namespace App\Http\Controllers\Admin\Metadata;

use App\Models\Industry;
use App\Traits\FileManager;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndustryController extends Controller
{
    use FileManager;
    public function index()
    {
        return view('content.tables.metadata.industries');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:industries,name',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100',
        ]);

        Industry::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $this->uploadFile($request->file('image'), 'images/industries', 'industry'),
        ]);

        return response()->json([
            'message' => 'Industry created successfully',
            'status' => 'success',
            'refresh_table' => true,
        ]);
    }
}
