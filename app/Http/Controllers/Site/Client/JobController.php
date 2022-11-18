<?php

namespace App\Http\Controllers\Site\Client;

use App\Action\Client\ClientJobAction;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExperienceLevel;
use App\Models\JobApplication;
use App\Models\JobInvitation;
use App\Models\Skill;
use App\Models\User;
use App\Models\WorkLength;
use App\View\Components\site\InvitedCandidate;
use App\View\Components\site\JobApplication as JobApplicationComponent;
use App\View\Components\site\SuggestedCandidate;
use Illuminate\Support\Facades\Log;

class JobController extends Controller
{
    public function index()
    {

        $user = auth()->user();

        $jobs =  $user->posted_jobs()->withCount(['applications'])->paginate(10);


        return view('site.dashboard.client.jobs', compact('jobs'));
    }

    public function create()
    {

        $categories = Category::active()->get();
        $skills = Skill::active()->get();
        $experience_levels = ExperienceLevel::active()->get();
        $length = WorkLength::active()->get();
        return view('site.dashboard.client.create-job', compact(
            'categories',
            'skills',
            'experience_levels',
            'length'
        ));
    }

    public function store(Request $request, ClientJobAction $action)
    {

        $request->validate([
            'job_title' => 'required',
            'job_description' => 'required|string|max:5000',
            'industry' => 'required|exists:categories,id',
            'category' => 'required|exists:sub_categories,id',
            'experience' => 'required|exists:experience_levels,id',
            'skills' => 'required|array',
            'payment_type' => 'required|in:hourly,fixed',
            'from' => 'required|numeric',
            'to' => 'required|numeric',
            'project_length' => 'required|exists:work_lengths,id',
            'project_size' => 'required|string|in:small,medium,large',
            'total_hours' => 'required|numeric',
        ]);
        $user = auth()->user();
        $action->jobStoreAction($request, $user);

        return response()->json([
            'message' => 'Job created successfully'
        ]);
    }



    public function details($slug)
    {
        $job = auth()->user()->posted_jobs()
            ->with([
                'client:id,name',
                'skills' => ['skill:id,name'],
                'sub_category:id,name',
                'experience:id,name,slug',
                'work_length:id,name,slug',
                'applications' => ['user:id,name,email,images'],
            ])
            ->when(auth()->check(), function ($query) {
                $query->withCount(['likes' => function ($query) {
                    $query->where('user_id', auth()->id());
                }]);
            })
            ->where('slug', $slug)->firstOrFail();

        $already_applied_candidates = $job->applications->pluck('user_id')->toArray();

        $suggestedCandidates = User::whereNotIn('id', $already_applied_candidates)->isUser()->active()->get();



        return view('site.dashboard.client.job-details', compact('job', 'suggestedCandidates'));
    }



    public function suggestedCandidates(Request $request)
    {

        $request->validate([
            'job_id' => 'required|exists:jobs,id',
        ]);
        if (!$request->ajax()) {
            return response()->json([
                'message' => 'Invalid request'
            ], 400);
        }
        $user = auth()->user();
        $already_applied = $user->posted_jobs()->where('id', $request->job_id)->firstOrFail()->applications->pluck('user_id')->toArray();
        $already_invited = $user->posted_jobs()->where('id', $request->job_id)->firstOrFail()->invites->pluck('user_id')->toArray();
        $suggestedCandidates = User::whereNotIn('id', $already_applied)
            ->whereNotIn('id', $already_invited)
            ->isUser()->active()->get();

        $candidate_html = new SuggestedCandidate($suggestedCandidates);

        return response()->json([
            'status' => 'success',
            'html' => $candidate_html->render()->with('candidates', $suggestedCandidates)->toHtml(),
        ]);
    }


    public function applications(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
        ]);
        if (!$request->ajax()) {
            return response()->json([
                'message' => 'Invalid request'
            ], 400);
        }


        $user = auth()->user();

        $applications = $user->posted_jobs()->where('id', $request->job_id)->firstOrFail()
            ->applications()
            ->where('status', '!=', 'accepted')
            ->with(['user:id,name,email,images'])->get();

        $applications_html = new JobApplicationComponent($applications);


        return response()->json([
            'status' => 'success',
            'html' => $applications_html->render()->with('applications', $applications)->toHtml(),
        ]);
    }

    public function applicationAction(Request $request)
    {

        $request->validate([
            'id' => 'required|exists:job_applications,id',
            'status' => 'required|in:accepted,rejected',
        ]);

        if (!$request->ajax()) {
            return response()->json([
                'message' => 'Invalid request'
            ], 400);
        }

        $user = auth()->user();

        $application = JobApplication::where('id', $request->id)
            ->with(['job:id,user_id'])
            ->firstOrFail();

        if ($application->job->user_id != $user->id) {
            return response()->json([
                'message' => 'Invalid request'
            ], 400);
        }

        $application->update([
            'status' => $request->status
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Application ' . $request->status . ' successfully'
        ]);
    }



    public function inviteCandidate(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'user_id' => 'required|exists:users,id',
        ]);
        if (!$request->ajax()) {
            return response()->json([
                'message' => 'Invalid request'
            ], 400);
        }

        $user = auth()->user();

        $job = $user->posted_jobs()->where('id', $request->job_id)->firstOrFail();

        $job->invites()->where('user_id', $request->user_id)->firstOrCreate([
            'user_id' => $request->user_id,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'User invited successfully'
        ]);
    }


    public function invitedCandidates(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
        ]);

        if (!$request->ajax()) {
            return response()->json([
                'message' => 'Invalid request'
            ], 400);
        }

        $user = auth()->user();

        $invites = $user->posted_jobs()->where('id', $request->job_id)->firstOrFail()
            ->invites()->with(['user:id,name,email,images'])->get();

        $invites_html = new InvitedCandidate($invites);

        return response()->json([
            'status' => 'success',
            'html' => $invites_html->render()->with('invitations', $invites)->toHtml(),
        ]);
    }

    public function hiredCandidates(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
        ]);

        if (!$request->ajax()) {
            return response()->json([
                'message' => 'Invalid request'
            ], 400);
        }

        $user = auth()->user();

        $hired = $user->posted_jobs()->where('id', $request->job_id)->firstOrFail()
            ->hired_candidates()->with(['user:id,name,email,images'])->get();

        $hired_html = new JobApplicationComponent($hired);

        return response()->json([
            'status' => 'success',
            'html' => $hired_html->render()->with('applications', $hired)->toHtml(),
        ]);
    }
}
