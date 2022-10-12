<?php

namespace App\Http\Controllers\Admin\Metadata;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\FileManager;

class CategoryController extends Controller
{
    use FileManager;

    public function index()
    {
        return view('content.tables.metadata.categories');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:512',
        ]);

        //upload image

        $img = $this->uploadFile($request->image, 'images', 'img');

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $img,
        ]);

        return response([
            'header' => 'Category Created',
            'message' => 'Category has been created successfully',
            'refresh_table' => true,
        ]);
    }
}
