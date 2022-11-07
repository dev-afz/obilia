<?php

namespace App\View\Components\site;

use Illuminate\View\Component;

class Subcategory extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $subcategories;

    public function __construct(
        $subcategories,
    ) {
        $this->subcategories = $subcategories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.subcategory');
    }
}
