<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MontoCobrador;

class CobradorAumentoComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['selectUser' => 'selectUser'];
    public $filtro = '';
    public function actualizarFiltro($valor)
    {
        $this->filtro = $valor;
    }
    public function render()
    {
        $usuarios = User::where('role_id', 3)->get();


        $monto_cobrador = MontoCobrador::query();

        if (!empty($this->filtro)) {
            $monto_cobrador->where('user_id', $this->filtro)->orderBy('created_at', 'desc')->get();
        } else {
            $monto_cobrador->orderBy('created_at', 'desc')->get();
        }
        $monto_cobrador = $monto_cobrador->paginate(5);
        // $monto_cobrador =  MontoCobrador::orderBy('created_at', 'desc')->paginate(5);s
        return view('livewire.admin.cobrador-aumento-component', compact('monto_cobrador', 'usuarios'))
            ->extends('cobranza.master')
            ->section('content');
    }
}
