<?php

namespace App\Http\Livewire\Cobrador;

use Livewire\Component;

class ReporteComponent extends Component
{
    public function render()
    {
        return view('livewire.cobrador.reporte-component')
        ->extends('cobranza.master')
        ->section('content');
    }
}
