<?php

namespace App\View\Components\AdminPanel\Includes;

use Illuminate\View\Component;
use Illuminate\View\View;

class RightSideBar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.admin-panel.includes.right-side-bar');
    }
}
