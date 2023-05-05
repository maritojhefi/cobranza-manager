<?php

namespace App\Http\Livewire\Cobrador;

use Livewire\Component;
use App\Models\CajaSemanal;

class VerGastoCobradorSemanaComponent extends Component
{


    public function render()
    {
        $registros = getGastosCajas(auth()->user()->id);

        // dd($registros);
        $arrayCajas = [];
        foreach ($registros as $key => $value) {
            $caja = CajaSemanal::where('id', $key)->get();
            array_push($arrayCajas, $caja);
        }
        return view('livewire.cobrador.ver-gasto-cobrador-semana-component', compact('registros', 'arrayCajas'))
            ->extends('cobranza.master')
            ->section('content');
    }
}
