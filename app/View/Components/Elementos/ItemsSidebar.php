<?php

namespace App\View\Components\Elementos;

use Illuminate\View\Component;

class ItemsSidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $lista,$titulo,$segmentoLink,$ruta;
    public function __construct($lista=[],$titulo,$segmentoLink,$ruta=null)
    {
        // dd($lista);
        $this->lista=$lista;
        $this->titulo=$titulo;
        $this->segmentoLink=$segmentoLink;
        $this->ruta=$ruta;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.elementos.items-sidebar');
    }
}
