<?php

namespace App\View\Components\Site;

use Illuminate\View\Component;

class layout extends Component
{
    public $title;
    public $scripts;
    public function __construct(
        string $title = 'No title',
        array $scripts = []

    ) {
        $this->title = $title . ' - ' . config('app.name');
        $this->scripts = $scripts;
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
