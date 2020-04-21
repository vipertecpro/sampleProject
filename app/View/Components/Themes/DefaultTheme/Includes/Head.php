<?php

namespace App\View\Components\Themes\DefaultTheme\Includes;

use Illuminate\View\Component;

class Head extends Component
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
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.themes.default.head');
    }
}
