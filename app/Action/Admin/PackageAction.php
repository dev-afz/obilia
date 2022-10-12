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

            $package = Package::create([
                'name' => $request->name,
                'title' => $request->title,
                'description' => $request->description,
                'duration' => $request->duration,
                'for' => $request->for,
                'is_subscription' => $request->payment_type == 'subscription' ? 'yes' : 'no',
                'price' => $request->price,
                'discount' => $request->discount,
            ]);

            foreach ($request->perks as $key => $perk) {
                $package->perks()->create([
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
