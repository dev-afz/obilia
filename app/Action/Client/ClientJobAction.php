<?php

namespace App\Action\Client;


use App\Models\Job;
use App\Models\JobSkill;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientJobAction
{

    public function jobStoreAction(Request $request): void
    {
        DB::beginTransaction();
        $job = Job::create([
            'title' => $request->job_title,
            'slug' => Str::slug($request->job_title),
            'description' => $request->job_description,
            'payment_type' => $request->payment_type,
            'work_hours' => $request->total_hours,
            'size' => $request->project_size,
            'country' => 'india',
            'rate_from' => $request->from,
            'rate_to' => $request->to,
            'experience_level_id' => $request->experience,
            'sub_category_id' => $request->category,
            'work_length_id' => $request->project_length,
            'size' => $request->project_size,
        ]);
        $data = [];
        foreach ($request->skills as $key => $value) {
            if (str_contains($value, 'new_skill_')) {
                $data[] = [
                    'job_id' => $job->id,
                    'skill_id' => null,
                    'other_skill' => str_replace('new_skill_', '', $value),
                    'created_at' => now(),
                ];
            } else {
                $data[] = [
                    'job_id' => $job->id,
                    'skill_id' => $value,
                    'other_skill' => null,
                    'created_at' => now(),
                ];
            }
        }
        JobSkill::insert($data);
        DB::commit();
    }





    public function makeMetadata(Job $job)
    {
    }
}
