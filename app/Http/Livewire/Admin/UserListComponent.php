<?php

namespace App\Http\Livewire\Admin;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MontoCobrador;
use Illuminate\Support\Facades\Hash;

class UserListComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public Role $role_id;
    public $buscar, $pendientes = false;
    protected $queryString = ['buscar', 'pendientes'];
    protected $listeners = ['eliminarUsuario' => 'eliminarUsuario', 'aumentoUser' => 'aumentoUser', 'calculoMonto' => 'calculoMonto', 'guardarAumento' => 'guardarAumento', 'cambioPassword' => 'cambioPassword', 'guardarPassword' => 'guardarPassword'];
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
    public function aumentoUser(User $user)
    {
        $this->emit('mostrarModalAumento', $user);
    }
    public function calculoMonto($monto, User $user)
    {
        $montoAumento = $monto;
        $montoTotal = (float)$user->billetera + (float)$monto;
        $montos = [$montoAumento, $montoTotal];
        $this->emit('montosAumento', $montos);
    }
    public function guardarAumento(User $user, $montoActual, $montoAumento)
    {




        $error = validar([
            'monto_aumento' => [
                $montoAumento,
                'required|numeric',
                ['monto_aumento.numeric' => 'El monto debe ser unnumero']
            ]
        ]);
        if (!$error) {
            try {
                if ($user) {
                    $montoCobrador = MontoCobrador::create([
                        'monto_actual' => $montoActual,
                        'monto_aumento' => $montoAumento,
                        'monto_total' => $montoAumento + $montoActual,
                        'user_id' => $user->id,
                    ]);
                    $montoCobrador->save();
                    $user->billetera = $montoCobrador->monto_total;
                    $user->save();
                    $toast = [
                        'icon' => 'success',
                        'title' => 'Se creo el aumento con exito'
                    ];
                    $this->emit('toastDispatch', $toast);
                }
            } catch (\Throwable $th) {
                $toast = [
                    'icon' => 'info',
                    'title' => 'Ocurrio un error al intentar crear el aumento'
                ];
                $this->emit('toastDispatch', $toast);
            }
        } else {
            $toast = [
                'icon' => 'error',
                'title' => $error
            ];
        }
        $this->emit('toastDispatch', $toast);
    }
    public function guardarPassword(User $user, $password, $password_confirmation)
    {
        $error = validar([
            'password' => [
                $password,
                'required|min:2',
                ['password.min' => 'La contraseña debe ser mayor a 1 caracter']
            ],
            'password_confirmation' => [
                $password_confirmation,
                'required|same:password',
                ['password_confirmation.same' => 'Las contraseñas no coinciden']
            ]
        ]);
        if (!$error) {
            try {
                if ($user) {
                    $user = User::find($user->id);
                    $user->password = $password;
                    $user->save();
                    $toast = [
                        'icon' => 'success',
                        'title' => 'Se Actualizo la contraseña para el usuario exitosamente'
                    ];
                    $this->emit('toastDispatch', $toast);
                }
            } catch (\Throwable $th) {
                $toast = [
                    'icon' => 'info',
                    'title' => 'No se pudo cambiar la contraseña del usuario intente nuevamente'
                ];
                $this->emit('toastDispatch', $toast);
            }
        } else {
            $toast = [
                'icon' => 'error',
                'title' => $error
            ];
        }
        $this->emit('toastDispatch', $toast);
    }
    public function cambioPassword(User $user)
    {
        $this->emit('mostrarModalPassword', $user);
    }
    public function eliminarUsuario(User $user)
    {
        if ($user->role_id == 4) {
            $tipo = 'cliente';
        } elseif ($user->role_id == 3) {
            $tipo = 'cobrador';
        }
        try {
            if ($user->prestamosPendientes->count() > 0) {
                $toast = [
                    'icon' => 'error',
                    'title' => 'No se pudo eliminar al ' . $tipo . ', tiene prestamos pendientes'
                ];
                $this->emit('toastDispatch', $toast);
            } else {
                $user->delete();
                $toast = [
                    'icon' => 'info',
                    'title' => 'Se elimino al' . $tipo
                ];
                $this->emit('toastDispatch', $toast);
            }
        } catch (\Throwable $th) {
            $toast = [
                'icon' => 'error',
                'title' => 'No se pudo eliminar al ' . $tipo . ', áun tiene pendientes'
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
