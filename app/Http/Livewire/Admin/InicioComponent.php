<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class InicioComponent extends Component
{
    public function render()
    {
        $cobradores=User::where('role_id',3)->orderBy('created_at','desc')->take(4)->get();
        return view('livewire.admin.inicio-component',compact('cobradores'));
    }
}
