<?php

namespace App\View\Components\Site;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class JobDetails extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $job;
    public $suggestedCandidates;
    public $showControl;
    public function __construct(
        Job $job,
        bool $showControl = false,
        array|Collection  $suggestedCandidates = null
    ) {
        $this->job = $job;
        $this->showControl = $showControl;
        $this->suggestedCandidates = $suggestedCandidates;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.job-details');
    }
}
