<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $id;
    public $class;
    public $method;
    public $route;
    public $btnText;
    public $reset;
    public $reload;
    public $successCallback;
    public $errorCallback;
    public $beforeSendCallback;
    public function __construct(
        string $id,
        string $route,
        string $class = "",
        string $method = "POST",
        string $btnText = "Submit",
        bool $reset = true,
        int $reload = 0,
        string $successCallback = "none",
        string $errorCallback = "none",
        string $beforeSendCallback = "none"
    ) {
        $this->id = $id;
        $this->class = $class;
        $this->method = $method;
        $this->route = $route;
        $this->btnText = $btnText;
        $this->reset = $reset;
        $this->reload = $reload;
        $this->successCallback = $successCallback;
        $this->errorCallback = $errorCallback;
        $this->beforeSendCallback = $beforeSendCallback;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form');
    }
}
