<?php

namespace App\View\Components\Site;

use Illuminate\View\Component;

class Hero extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $categories;

    public function __construct(
        $categories
    ) {
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.hero');
    }
}
