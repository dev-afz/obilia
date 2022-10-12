<?php

namespace App\View\Components\site;

use Illuminate\View\Component;

class Styles extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $include;
    public function __construct(array $include = [])
    {
        $this->include = $include;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.styles');
    }
}
