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
    public $userFiltro;
    public function selectUser($user_id)
    {
dd($user_id);
        $this->userFiltro = MontoCobrador::where('user_id', $user_id);
    }
    public function render()
    {
        $usuarios = User::where('role_id', 3)->get();
        $monto_cobrador =  MontoCobrador::orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.admin.cobrador-aumento-component', compact('monto_cobrador', 'usuarios'))
            ->extends('cobranza.master')
            ->section('content');;
    }
}
