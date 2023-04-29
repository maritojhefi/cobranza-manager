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
    public $buscar, $pendientes = false;
    protected $queryString = ['buscar', 'pendientes'];
    protected $listeners = ['eliminarUsuario' => 'eliminarUsuario'];
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
    public function buscarUsuariosPendientes()
    {
        $query = User::has('prestamosPendientes');

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
    public function mapsUserAll()
    {
        return redirect()->route('admin.maps.user');
    }
    public function eliminarUsuario(User $user)
    {
        try {
            $user->delete();
            $toast = [
                'icon' => 'info',
                'title' => 'Se elimino al cobrador'
            ];
            $this->emit('toastDispatch', $toast);
        } catch (\Throwable $th) {
            $toast = [
                'icon' => 'error',
                'title' => 'No se pudo eliminar al cobrador, áun tiene deudas pendientes'
            ];
            $this->emit('toastDispatch', $toast);
        }
    }

    public function render()
    {
        if ($this->pendientes) {
            if ($this->role_id->id == 4) {
                $users = User::has('prestamosPendientes')->where('role_id', $this->role_id->id)->orderBy('created_at', 'desc')->paginate(20);
            } else if ($this->role_id->id == 3) {
                $users = User::has('prestamosPendientes')->where('role_id', $this->role_id->id)->orderBy('created_at', 'desc')->paginate(20);
            }
            $users = $this->buscarUsuariosPendientes();
        } else {
            if ($this->role_id->id == 4) {
                $users = User::where('role_id', $this->role_id->id)->orderBy('created_at', 'desc')->paginate(20);
            } else if ($this->role_id->id == 3) {
                $users = User::where('role_id', $this->role_id->id)->orderBy('created_at', 'desc')->paginate(20);
            }
            $users = $this->buscarUsuarios();
        }


        return view('livewire.admin.user-list-component', compact('users'))
            ->extends('cobranza.master')
            ->section('content');
    }
}
