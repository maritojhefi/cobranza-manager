<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\Gasto;
use Livewire\Component;
use Livewire\WithPagination;

class VerGastosAdminComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public function render()
    {
        // $gastos = Gasto::with('user')->orderBy('created_at', 'desc');
        $cobradores = User::has('gastos')
            ->where('role_id', 3)
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('ci', 'like', '%' . $this->search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.admin.ver-gastos-admin-component', compact('cobradores'))
            ->extends('cobranza.master')
            ->section('content');
    }
}