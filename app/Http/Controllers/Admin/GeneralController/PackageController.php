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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'duration' => 'required|integer|min:30',
            'for' => 'required|string|in:individual,agency',
            'payment_type' => 'required|string|in:onetime,subscription',
            'price' => 'required|numeric|min:1',
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
