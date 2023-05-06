<?php

namespace App\Http\Livewire\Cobrador;

use App\Models\User;
use Livewire\Component;
use App\Models\Prestamo;
use App\Models\CajaSemanal;

class CobradorPrestadoReportComponent extends Component
{
    public $caja;

    public function mount($caja = null)
    {
        if ($caja) {
            $this->caja = $caja;
        }
    }
    public function mostrarPrestamoMany($caja)
    {
        $registros = Prestamo::with('user')->where([['cobrador_id', auth()->user()->id], ['caja_id', $caja]])->get();
        $this->emit('mostrarSemana', $registros);
    }
    public function mostrarPrestamoSingle($registros)
    {
        // dd( json_decode($registros));
        $this->emit('mostrarSemana', json_decode($registros));
    }
    public function render()
    {
        $prestamos = Prestamo::with('user')->get();
        if ($this->caja) {
            $cajaSeleccionada = CajaSemanal::find($this->caja);
            $registros  = getRegistrosPorCaja(User::getCurrentUser(), $prestamos, $this->caja);
            return view('livewire.cobrador.cobrador-prestado-report-component', compact('registros', 'cajaSeleccionada'))
                ->extends('cobranza.master')
                ->section('content');
        } else {
            $registros  = getRegistrosPorCaja(User::getCurrentUser(), $prestamos);
            $arrayCajas = [];
            foreach ($registros as $key => $value) {
                $caja = CajaSemanal::where('id', $key)->get();
                array_push($arrayCajas, $caja);
            }
            return view('livewire.cobrador.cobrador-prestado-report-component', compact('registros', 'arrayCajas'))
                ->extends('cobranza.master')
                ->section('content');
        }
    }
}
