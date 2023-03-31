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



    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:industries,name,' . $request->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:512',
            'id' => 'required|int',
        ]);

        $industry = Industry::findOrFail($request->id);

        $industry->name = $request->name;

        if ($request->hasFile('image')) {
            // $this->deleteFile($industry->image);
            $industry->image = $this->uploadFile($request->file('image'), 'images/industries', 'industry');
        }

        $industry->save();

        return response()->json([
            'message' => 'Industry updated successfully',
            'status' => 'success',
            'refresh_table' => true,
        ]);
    }
}
