<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UserCrudComponent extends Component
{
    use WithFileUploads;
    public $name, $apellido, $telf, $foto, $ci, $direccion, $lat, $long, $editando = false, $usuario;

    protected $rules = [
        'name' => 'required|string',
        'apellido' => 'required|string',
        'telf' => 'required|string',
        'foto' => 'nullable',
        'ci' => 'required|string',
        'direccion' => 'required|string',
        'lat' => 'nullable',
        'long' => 'nullable'
    ];
    public function resetInputs()
    {
        $this->editando = false;
        $this->reset('name', 'apellido', 'telf', 'foto', 'ci', 'direccion', 'lat', 'long');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function submit()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'apellido' => $this->apellido,
            'telf' => $this->telf,
            'ci' => $this->ci,
            'direccion' => $this->direccion,
            'lat' => $this->lat,
            'long' => $this->long,
        ]);
    }
    public function render()
    {
        return view('livewire.admin.user-crud-component')
            ->extends('cobranza.master')
            ->section('content');
    }
}
