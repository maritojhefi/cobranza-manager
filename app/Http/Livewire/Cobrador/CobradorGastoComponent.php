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
    public function resetInputs()
    {
        $this->reset();
    }
    public function guardarGasto($monto, $descripcion)
    {
        $error = validar([
            'monto' => [
                $monto,
                'required|numeric|min:1',
                ['numeric' => 'Ingrese un numero valido para el monto', 'monto.min' => 'El monto debe ser mayor a 0']
            ],
            'descripcion' => [
                $descripcion,
                'required|string|min:5',
                ['descripcion.min' => 'La descripcion debe contener al menos 5 caracteres']
            ]
        ]);
        if (!$error) {
            $this->monto = $monto;
            $this->descripcion = $descripcion;
            $this->gasto = Gasto::create([
                'user_id' => User::getCurrentUser()->id,
                'monto' => $monto,
                'descripcion' => $descripcion,
            ]);
            $this->gasto->save();
            return redirect()->route('cobrador.gasto.create')->with('success', 'Gasto Creado!');
        } else {
            $toast = [
                'icon' => 'error',
                'title' => $error
            ];
        }
        $this->emit('toastDispatch', $toast);
    }
    public function render()
    {
        $user = User::getCurrentUser();
        $fechaActual = Carbon::now()->format('Y-m-d');
        if (auth()->user()->role_id == 1) {
            $this->gastoUser = Gasto::whereDate('created_at', $fechaActual)->orderBy('created_at', 'desc')->get();
        } else {
            $this->gastoUser = Gasto::where('user_id', $user->id)->whereDate('created_at', $fechaActual)->orderBy('created_at', 'desc')->get();
        }
        return view('livewire.cobrador.cobrador-gasto-component', compact('user', 'fechaActual'))
            ->extends('cobranza.master')
            ->section('content');
    }
}