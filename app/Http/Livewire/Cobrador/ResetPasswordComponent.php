<?php

namespace App\Http\Livewire\Cobrador;

use App\Models\User;
use Livewire\Component;

class ResetPasswordComponent extends Component
{
    public $password, $password_confirmation;
    public function cambiarContraseña()
    {
        // dd(auth()->id(), $this->password, $this->password_confirmation);
        $error = validar([
            'password' => [
                $this->password,
                'required|min:2',
                ['password.min' => 'La contraseña debe ser mayor a 1 caracter']
            ],
            'password_confirmation' => [
                $this->password_confirmation,
                'required|same:password',
                ['password_confirmation.same' => 'Las contraseñas no coinciden']
            ]
        ]);
        if (!$error) {
            try {
                $user = User::find(auth()->id());
                $user->password = $this->password;
                $user->save();
                // $toast = [
                //     'icon' => 'success',
                //     'title' => 'Tú contraseña fue actualizada correctamente!'
                // ];
                // $this->emit('toastDispatch', $toast);

                return redirect()->route('cobrador.inicio')->with('success',  'Tú contraseña fue actualizada correctamente!');
            } catch (\Throwable $th) {
                $toast = [
                    'icon' => 'info',
                    'title' => 'No se pudo cambiar tú contraseña intenta nuevamente'
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
    public function render()
    {
        return view('livewire.cobrador.reset-password-component')
            ->extends('cobranza.master')
            ->section('content');
    }
}
