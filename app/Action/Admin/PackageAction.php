<?php

namespace App\Action\Admin;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Log;

class PackageAction
{

    public function create(Request $request): void
    {
        DB::beginTransaction();

        try {

            $package_monthly = Package::create([
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'duration' => 28,
                'price' => $request->price,
                'discount' => $request->discount,
            ]);
            $package_yearly = Package::create([
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'duration' => 365,
                'price' => $request->price_yearly,
                'discount' => $request->discount,
            ]);

            foreach ($request->perks as $key => $perk) {
                $package_monthly->perks()->create([
                    'name' => $perk['title'],
                    'value' => $perk['value'],
                ]);
                $package_yearly->perks()->create([
                    'name' => $perk['title'],
                    'value' => $perk['value'],
                ]);
            }
        } catch (\Exception $e) {

            Log::error([
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'from' => __FILE__,
                'function' => __FUNCTION__,
            ]);

            throw ValidationException::withMessages([
                'message' => 'Something went wrong',
                'Error' => $e->getMessage(),
            ]);
        }

        DB::commit();
    }
}
