<?php

namespace App\Http\Livewire\Cobrador;

use Livewire\Component;
use App\Models\CajaSemanal;

class VerGastoCobradorSemanaComponent extends Component
{


    public function render()
    {
        $registros = getGastosCajas(auth()->user()->id);

dd($registros);
        return view('livewire.cobrador.ver-gasto-cobrador-semana-component', compact('registros'))
            ->extends('cobranza.master')
            ->section('content');
    }
}
