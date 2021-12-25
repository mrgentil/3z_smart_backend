<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Sidebar extends Component
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user = \Auth::user();
        $modules = $user->role->modules;

        $module_array = [];

        foreach ($modules as $module) {
            $module_array[] = $module->name;
        }


        return view('components.sidebar', compact('module_array'));
    }
}
