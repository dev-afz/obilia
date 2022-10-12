<?php

namespace App\Http\Controllers\Admin\GeneralController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        return view('content.tables.packages');
    }


    public function add()
    {
        return view('content.forms.add-package');
    }


    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'duration' => 'required|integer|min:30',
            'for' => 'required|string|in:individual,agency',
            'package_type' => 'required|string|in:onetime,subscription',
            'price' => 'required|numeric|min:1',
            'discount' => 'nullable|numeric|min:0',
            'perks' => 'required|array',
            'perks.*.title' => 'required|string',
            'perks.*.value' => 'required',

        ]);
        return $request->all();
    }
}
