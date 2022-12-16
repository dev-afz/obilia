<?php

namespace App\Http\Controllers\Admin\Metadata;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Traits\FileManager;

class CategoryController extends Controller
{
    use FileManager;

    public function index()
    {
        $industries = Industry::active()->get();
        return view('content.tables.metadata.categories', compact('industries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,gif,webp|max:100',
            'industry' => 'required|exists:industries,id'
        ]);

        //upload image

        $img = $this->uploadFile($request->image, 'images/category', 'img');

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $img,
            'industry_id' => $request->industry
        ]);

        return response([
            'header' => 'Category Created',
            'message' => 'Category has been created successfully',
            'refresh_table' => true,
        ]);
    }
}
