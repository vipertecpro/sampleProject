<?php

namespace App\View\Components\Themes;

use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;
use Illuminate\View\View;

class Footer extends Component
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
        return view('components.themes.'. Request::get('themeName').'.footer');
    }
}
