<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class TarjetaResumenComponent extends Component
{
    public $user;
    public function mount(User $user)
    {
        $this->user=$user;
    }
    public function render()
    {
        return view('livewire.tarjeta-resumen-component');
    }
}
