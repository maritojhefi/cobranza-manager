<?php

namespace App\Http\Livewire\Admin;

use App\Models\Gasto;
use Livewire\Component;

class CobradorGastoAdminComponent extends Component
{
    public $cobrador_id, $user;
    protected $queryString = ['cobrador_id'];
    protected $listeners = ['eliminarGasto' => 'eliminarGasto'];
    public function eliminarGasto(Gasto $gasto)
    {
        $gasto->delete();
        $toast = [
            'icon' => 'success',
            'title' => 'Se elimino el gasto con exito!'
        ];
        $this->emit('closeModal', true);
        $this->emit('toastDispatch', $toast);
    }
    public function render()
    {
        $gastos = Gasto::with('user')->where('user_id', $this->cobrador_id)->orderBy('created_at', 'desc')->get();
        return view('livewire.admin.cobrador-gasto-admin-component', compact('gastos'))
            ->extends('cobranza.master')
            ->section('content');
    }
}