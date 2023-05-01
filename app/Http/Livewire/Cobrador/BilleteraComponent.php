<?php

namespace App\Http\Livewire\Cobrador;

use Livewire\Component;

class BilleteraComponent extends Component
{
    public function render()
    {
        return view('livewire.cobrador.billetera-component')
        ->extends('cobranza.master')
        ->section('content');
    }
}
