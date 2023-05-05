<?php

namespace App\Http\Livewire\Cobrador;

use Livewire\Component;
use App\Models\CajaSemanal;
use App\Models\Gasto;

class VerGastoCobradorSemanaComponent extends Component
{

    public function mostrarGasto($caja)
    {
        $registros = Gasto::where([['user_id', auth()->user()->id], ['caja_id', $caja]])->get();
        $this->emit('mostrarSemana', $registros);
    }
    public function render()
    {
        $registros = getGastosCajas(auth()->user()->id);
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
