<?php

namespace App\View\Components\AdminPanel\Includes;

use Illuminate\View\Component;
use Illuminate\View\View;

class Plugins extends Component
{
    public $plugins = [
        'dataTables'
    ];
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        $plugins = $this->plugins;
        return view('components.admin-panel.includes.plugins',compact('plugins'));
    }
}
