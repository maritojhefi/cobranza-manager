<?php

namespace App\Http\Livewire\Cobrador;

use App\Models\User;
use Livewire\Component;

class AbonoComponent extends Component
{
    public $user_id,$user;
    protected $queryString = ['user_id'];
    
    public function render()
    {
        $this->user=User::find($this->user_id);
        return view('livewire.cobrador.abono-component')
        ->section('content')
        ->extends('cobranza.master');
    }
}
