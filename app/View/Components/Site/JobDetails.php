<?php

namespace App\View\Components\Site;

use App\Models\Job;
use Illuminate\View\Component;

class JobDetails extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $job;
    public $showControl;
    public function __construct(
        Job $job,
        bool $showControl = false
    ) {
        $this->job = $job;
        $this->showControl = $showControl;
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
