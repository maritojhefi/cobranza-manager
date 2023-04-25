<?php

namespace App\Http\Livewire\Cobrador;

use App\Models\User;
use App\Models\Gasto;
use Carbon\Carbon;
use Livewire\Component;

class CobradorGastoComponent extends Component
{
    public $gastoUser, $monto, $descripcion, $gasto;
    protected $listeners = ['guardarGasto' => 'guardarGasto'];
    protected $rules = [
        'monto' => 'required|numeric',
        'descripcion' => 'required|string',
    ];
    public function resetInputs()
    {
        $this->reset();
    }
    public function guardarGasto($monto, $descripcion)
    {
        $this->monto = $monto;
        $this->descripcion = $descripcion;
        $this->validate();
        $this->gasto = Gasto::create([
            'user_id' => User::getCurrentUser()->id,
            'monto' => $monto,
            'descripcion' => $descripcion,
        ]);
        $this->gasto->save();
        $toast = [
            'icon' => 'success',
            'title' => 'Gasto Creado!'
        ];
        // $this->emit('toastDispatch', $toast);
        return redirect()->route('cobrador.list.gasto')->with('success', 'Gasto Creado!');
    }
    public function render()
    {
        $user = User::getCurrentUser();
        $fechaActual = Carbon::now()->format('Y-m-d');
        $this->gastoUser = Gasto::where('user_id', $user->id)->whereDate('created_at', $fechaActual)->orderBy('created_at', 'desc')->get();
        return view('livewire.cobrador.cobrador-gasto-component', compact('user', 'fechaActual'))
            ->extends('cobranza.master')
            ->section('content');;
    }
}
