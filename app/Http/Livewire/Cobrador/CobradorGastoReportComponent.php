<?php

namespace App\Http\Livewire\Cobrador;

use App\Models\CajaSemanal;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Gasto;
use Livewire\Component;

use function PHPSTORM_META\map;

class CobradorGastoReportComponent extends Component
{
    public $caja, $registros;

    public function mount($caja)
    {
        $this->registros = getGastosCajas(auth()->user()->id, $caja);
    }

    public function mostrarGasto($registros)
    {
        $this->emit('mostrarSemana', $registros);
        // $url = route('cobrador.gasto.ver.semana', ['registros' => $registros]);
        // return redirect()->to($url);
    }

    public function render()
    {
        $cajaSeleccionada = CajaSemanal::find($this->caja);
        return view('livewire.cobrador.cobrador-gasto-report-component', compact('cajaSeleccionada'))
            ->extends('cobranza.master')
            ->section('content');
    }
}
