<?php

namespace App\Http\Livewire\Cobrador;

use Livewire\Component;

class PrestamoCrudComponent extends Component
{
    public function render()
    {
        return view('livewire.cobrador.prestamo-crud-component')
        ->extends('cobranza.master')
        ->section('content');
    }
}
