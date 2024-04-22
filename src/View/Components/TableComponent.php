<?php

namespace Kovyakin\Table\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableComponent extends Component
{
    /**
     * Create a new component instance.
     */


    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
//        dd(config('table_vue.name'));
        $name = config('table_vue.name');
        return view('table::components.table-component')->with(['name' => $name]);
    }
}
