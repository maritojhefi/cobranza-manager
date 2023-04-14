<?php

namespace App\Http\Livewire\Admin;

use App\Models\Estado;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UserCrudComponent extends Component
{
    use WithFileUploads;
    public Role $role_id;
    public $user;
    public $name, $apellido, $telf, $foto, $ci, $direccion, $lat, $long, $editando = false, $usuario, $password, $password_confirmation;

    protected $queryString = ['search'];
    public function mount($role_id)
    {
        $this->role_id = $role_id;
        if ($role_id->id == 4) {
            $this->password = '0000';
            $this->password_confirmation = '0000';
        }
    }
    protected $rules = [
        'name' => 'required|string',
        'apellido' => 'required|string',
        'telf' => 'required|string',
        'ci' => 'required|string',
        'direccion' => 'required|string',
        'lat' => 'nullable',
        'long' => 'nullable',
        'password' => 'required|min:1',
        'password_confirmation' => 'required|same:password',
        'foto' => 'nullable|image'
    ];
    public function resetInputs()
    {
        $this->editando = false;
        $this->reset();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function submit()
    {
        $this->validate();
        $this->user = User::create([
            'name' => $this->name,
            'apellido' => $this->apellido,
            'telf' => $this->telf,
            'ci' => $this->ci,
            'direccion' => $this->direccion,
            'lat' => $this->lat,
            'long' => $this->long,
            'role_id' => $this->role_id->id,
            'estado_id' => Estado::ID_LIMPIO,
            'password' => $this->password
        ]);
        if ($this->foto) {
            $filename = time() . "." . $this->foto->extension();
            $rutaFoto = $this->foto->storeAs('/profiles',  $filename, 'publicdisk');
            $this->user->foto = $rutaFoto;
        } else {
            $this->user->foto = imageUser(false);
        }
        $this->user->save();
        return redirect()->route('admin.user.list', $this->role_id->id);
    }
    public function render()
    {
        return view('livewire.admin.user-crud-component')
            ->extends('cobranza.master')
            ->section('content');
    }
}
