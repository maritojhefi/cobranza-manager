<?php

namespace App\View\Components;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Abono;
use Illuminate\View\Component;

class ResumenSidebar extends Component
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
        
        return view('components.resumen-sidebar');
    }
}
