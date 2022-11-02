<?php

namespace App\View\Components\Site;

use Illuminate\View\Component;

class Form extends Component
{
    public $id;
    public $class;
    public $method;
    public $route;
    public $btnText;
    public $reset;
    public $block;
    public $reload;
    public $successCallback;
    public $errorCallback;
    public $beforeSendCallback;
    public $completeCallback;
    public $showNotification;
    public $returnData;

    public function __construct(
        string $id,
        string $route,
        string $class = "",
        string $method = "POST",
        string $btnText = null,
        bool $reset = true,
        string $block = 'body',
        int $reload = 0,
        string $successCallback = "none",
        string $errorCallback = "none",
        string $beforeSendCallback = "none",
        string $completeCallback = "none",
        int $showNotification = 1,
        int $returnData = 1,
    ) {
        $this->id = $id;
        $this->class = $class;
        $this->method = $method;
        $this->route = $route;
        $this->btnText = $btnText;
        $this->reset = $reset;
        $this->block = $block;
        $this->reload = $reload;
        $this->successCallback = $successCallback;
        $this->errorCallback = $errorCallback;
        $this->beforeSendCallback = $beforeSendCallback;
        $this->completeCallback = $completeCallback;
        $this->showNotification = $showNotification;
        $this->returnData = $returnData;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.form');
    }
}
