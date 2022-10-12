<?php

namespace App\View\Components\Site\Dashboard;

use Illuminate\View\Component;

class SubMenu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $menuData;
    public function __construct(
        array|object $menuData
    ) {
        $this->menuData = $menuData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.dashboard.sub-menu');
    }
}
