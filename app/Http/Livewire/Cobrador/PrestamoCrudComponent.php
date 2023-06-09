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
        'monto_inicial' => 'required|numeric|min:1',
        'monto_final' => 'required',
        'cuota' => 'required',
        'interes' => 'required|numeric|min:1',
        'dias' => 'required|integer|min:1',
        'fecha_final'=>'required|date'
    ];
    protected $messages = [
        'user_id.required' => 'Seleccione a un cliente.',
        'monto_inicial.required' => 'El monto es obligatorio.',
        'monto_inicial.min' => 'Ingrese un monto mayor a 1.',
        'interes.min' => 'El interes debe ser mayor a 1.',
        'interes.required' => 'El interes debe ser mayor a 1.',
        'dias.required' => 'La cantidad de dias debe ser mayor a 1',
        'dias.min' => 'La cantidad de dias debe ser mayor a 1',
    ];
    public function updated($propertyName)
    {
        
        $this->validateOnly($propertyName);
        $this->calculate();
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
        $this->calculate();
    }
    public function calculate()
    {
        $this->fecha_final = addDays($this->dias);
        $this->monto_final = (double)$this->monto_inicial + ((double)$this->monto_inicial * ((double)$this->interes / 100));
        $this->cuota = round(((double)$this->monto_final / (double)$this->dias), 1);
    }
    public function submit()
    {
        $array = $this->validate();
        $array['cobrador_id']=auth()->id();
        $prestamo = Prestamo::create($array);
        // $toast = [
        //     'icon' => 'success',
        //     'title' => 'Prestamo creado exitosamente!'
        // ];
        // $this->emit('toastDispatch', $toast);
        return redirect()->route('cobrador.abono',['user_id'=>$this->user_id])->with('success','Prestamo creado exitosamente!');
    }
    public function render()
    {
        $usuarios = User::select('id', 'name', 'apellido')->where('role_id', 4)->get();
        
        return view('livewire.cobrador.prestamo-crud-component', compact('usuarios'))
            ->extends('cobranza.master')
            ->section('content');
    }
}
