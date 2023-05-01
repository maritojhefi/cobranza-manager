<?php

namespace App\View\Components\Elementos;

use App\Models\User;
use Illuminate\View\Component;

class ChartTarjetasResumenComponent extends Component
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
        $user=User::find(auth()->id());
        return view('components.elementos.chart-tarjetas-resumen-component',compact('user'));
    }
}
