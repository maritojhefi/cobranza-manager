<?php

namespace App\Http\Livewire\Cobrador;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\CajaSemanal;

class ReporteComponent extends Component
{
    public $cajaSemanal;
    public function mount(CajaSemanal $cajaSemanal)
    {
        
        
        getCurrentCaja(auth()->user()->id);
       
    }
    public function render()
    {
        
        return view('livewire.cobrador.reporte-component')
            ->extends('cobranza.master')
            ->section('content');
    }
}
