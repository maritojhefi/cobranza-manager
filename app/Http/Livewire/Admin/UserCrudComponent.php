<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class UserCrudComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.user-crud-component')
            ->extends('cobranza.master')
            ->section('content');
    }
}
