<?php

namespace App\Http\Controllers\Admin\Metadata;

use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\FileManager;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    use FileManager;
    public function index()
    {
        $categories = Category::active()->get();
        return view('content.tables.metadata.sub-categories', compact('categories'));
    }




    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|integer|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        SubCategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $this->uploadFile($request->image, 'images/sub-category', 'img'),
            'slug' => Str::slug($request->name),
        ]);

        return response([
            'header' => 'Sub Category Created',
            'message' => 'Sub Category has been created successfully',
            'refresh_table' => true,
            'close_canvas' => 'addCanvas',
        ]);
    }
}
