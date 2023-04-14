<?php

namespace App\Http\Livewire\Admin;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserListComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public Role $role_id;
    public $buscar;
    protected $queryString = ['buscar'];
    public function updatingBuscar()
    {
        $this->resetPage();
    }
    public function mount($role_id)
    {
        $this->role_id = $role_id;
    }
    public function buscarUsuarios()
    {
        $query = User::query();

        if (isset($this->buscar)) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->buscar . '%')
                    ->orWhere('apellido', 'like', '%' . $this->buscar . '%')
                    ->orWhere('id', 'like', '%' . $this->buscar . '%')
                    ->orWhere('ci', 'like', '%' . $this->buscar . '%');
            });
        }

        $query->where('role_id', $this->role_id->id)
            ->orderBy('created_at', 'desc');

        return $query->paginate(20);
    }
    public function render()
    {
        if ($this->role_id->id == 4) {
            $users = User::where('role_id', $this->role_id->id)->orderBy('created_at', 'desc')->paginate(20);
        } else if ($this->role_id->id == 3) {
            $users = User::where('role_id', $this->role_id->id)->orderBy('created_at', 'desc')->paginate(20);
        }
        $users = $this->buscarUsuarios();
        return view('livewire.admin.user-list-component', compact('users'))
            ->extends('cobranza.master')
            ->section('content');
    }
}
