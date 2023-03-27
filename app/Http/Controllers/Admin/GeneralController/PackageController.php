<?php

namespace App\Http\Controllers\Admin\GeneralController;

use App\Action\Admin\PackageAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Package;

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


    public function store(Request $request, PackageAction $action)
    {


        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'price_yearly' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'perks' => 'required|array',
            'perks.*.title' => 'required|string',
            'perks.*.value' => 'required',

        ]);


        $action->create($request);

        return response()->json([
            'message' => 'Package created successfully',
            'status' => 'success',
            'header' => 'Success',
        ]);
    }
}
