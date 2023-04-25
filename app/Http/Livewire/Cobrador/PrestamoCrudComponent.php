<?php

namespace App\Http\Livewire\Cobrador;

use App\Models\Prestamo;
use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;

class PrestamoCrudComponent extends Component
{
    public $user_id, $estado_id = 2/* pendiente*/, $monto_inicial, $monto_final, $cuota, $interes, $dias, $fecha_final, $fecha_inicial;

    protected $listeners = ['usuarioID' => 'setUserId'];

    protected $queryString = ['user_id'];
    protected $rules = [
        'user_id' => 'required|integer',
        'estado_id' => 'required|integer',
        'monto_inicial' => 'required',
        'monto_final' => 'required',
        'cuota' => 'required',
        'interes' => 'required|numeric',
        'dias' => 'required|integer'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
    public function mount()
    {
        $this->fecha_inicial = Carbon::now()->format('Y-m-d');
        $this->dias = 24;
        $this->interes = 20;
    }
    public function submit()
    {
        $array = $this->validate();
        $array['cobrador_id']=1;
        $array['user_id']=auth()->id();

        $prestamo = Prestamo::create($array);
        
        // $toast = [
        //     'icon' => 'success',
        //     'title' => 'Prestamo creado exitosamente!'
        // ];
        // $this->emit('toastDispatch', $toast);
        return redirect()->route('cobrador.inicio')->with('success','Prestamo creado exitosamente!');
    }
    public function render()
    {
        $usuarios = User::select('id', 'name', 'apellido')->where('role_id', 4)->get();
        $this->fecha_final = addDays($this->dias);
        $this->monto_final = $this->monto_inicial + ($this->monto_inicial * ($this->interes / 100));
        // dd($this->monto_final,$this->dias);
        $this->cuota = round(((double)$this->monto_final / (double)$this->dias), 1);
        return view('livewire.cobrador.prestamo-crud-component', compact('usuarios'))
            ->extends('cobranza.master')
            ->section('content');
    }
}
