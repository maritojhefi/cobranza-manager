<?php

namespace App\Http\Livewire\Cobrador;

use App\Models\User;
use App\Models\Abono;
use Livewire\Component;
use App\Models\CajaSemanal;

class CobradorAbonoReportComponent extends Component
{
    public $caja;

    public function mount($caja = null)
    {
        if ($caja) {
            $this->caja = $caja;
        }
    }
    public function mostrarAbonoMany($caja)
    {
        $registro = Abono::with('prestamo')->where('caja_id', $caja)->get();
        // dd($registro);
        $this->emit('mostrarSemanaMany', $registro);
    }
    public function mostrarAbonoSingle($registros)
    {
        // dd((array)json_decode($registros));
        $this->emit('mostrarSemanaSingle', (array)json_decode($registros));
    }
    public function render()
    {
        $abonos = Abono::with('prestamo')->get();
        if ($this->caja) {
            $cajaSeleccionada = CajaSemanal::find($this->caja);
            $registros  = getRegistrosPorCaja(User::getCurrentUser(), $abonos, $this->caja);
            return view('livewire.cobrador.cobrador-abono-report-component', compact('registros', 'cajaSeleccionada'))
                ->extends('cobranza.master')
                ->section('content');
        } else {
            $registros  = getRegistrosPorCaja(User::getCurrentUser(), $abonos);
            $arrayCajas = [];
            foreach ($registros as $key => $value) {
                $caja = CajaSemanal::where('id', $key)->get();
                array_push($arrayCajas, $caja);
            }
            return view('livewire.cobrador.cobrador-abono-report-component', compact('registros', 'arrayCajas'))
                ->extends('cobranza.master')
                ->section('content');
        }
    }
}
