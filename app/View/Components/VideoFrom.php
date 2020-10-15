<?php

namespace App\View\Components;

use Illuminate\View\Component;

class VideoFrom extends Component
{
    public $title;
    public $url;
    public $btnType;
    public $postUrl;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title,$url,$btnType,$postUrl)
    {
        $this->title = $title;
        $this->url = $url;
        $this->btnType = $btnType;
        $this->postUrl = $postUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.video-from');
    }
}
