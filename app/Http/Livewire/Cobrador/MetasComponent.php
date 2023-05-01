<?php

namespace App\Http\Livewire\Cobrador;

use Livewire\Component;

class MetasComponent extends Component
{
    public function render()
    {
        return view('livewire.cobrador.metas-component')
        ->extends('cobranza.master')
        ->section('content');
    }
}
