<?php

namespace App\Http\Livewire\Admin;

use App\Models\Prestamo;
use App\Models\User;
use Livewire\Component;

class UserMapComponent extends Component
{
    public $users;
    public function render()
    {
        $this->users = User::with('estado')->has('prestamos')->where('role_id', 4)->get();
        return view('livewire.admin.user-map-component')
            ->extends('cobranza.master')
            ->section('content');
    }
}
