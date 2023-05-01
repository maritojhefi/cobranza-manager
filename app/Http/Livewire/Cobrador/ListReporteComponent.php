<?php

namespace App\Http\Livewire\Cobrador;

use App\Models\CajaSemanal;
use Livewire\Component;
use Livewire\WithPagination;

class ListReporteComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $cajas=CajaSemanal::orderBy('created_at','desc')->paginate(8);
        return view('livewire.cobrador.list-reporte-component',compact('cajas'))
        ->extends('cobranza.master')
        ->section('content');
    }
}
