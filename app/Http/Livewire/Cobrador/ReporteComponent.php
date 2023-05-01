<?php

namespace App\Http\Livewire\Cobrador;

use App\Models\CajaSemanal;
use Livewire\Component;

class ReporteComponent extends Component
{
    public $cajaSemanal;
    public function mount(CajaSemanal $cajaSemanal)
    {
        $this->cajaSemanal = $cajaSemanal;
    }
    public function render()
    {
        return view('livewire.cobrador.reporte-component')
            ->extends('cobranza.master')
            ->section('content');
    }
}
