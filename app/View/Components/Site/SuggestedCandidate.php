<?php

namespace App\View\Components\site;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class SuggestedCandidate extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $candidates;

    public function __construct(
        Collection|array   $candidates
    ) {
        $this->candidates = $candidates;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.suggested-candidate');
    }
}
