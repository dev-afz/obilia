<?php

namespace App\View\Components\Site;

use Illuminate\View\Component;

class layout extends Component
{
    public $title;
    public $include;
    public function __construct(
        string $title = 'No title',
        array $include = []

    ) {
        $this->title = $title . ' - ' . config('app.name');
        $this->include = $include;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.layout');
    }
}
