<?php

namespace App\Http\Livewire\Cobrador;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Abono;
use Livewire\Component;
use App\Models\Prestamo;

class AddAbonoComponent extends Component
{
    public $prestamo, $calendario,$dias;
    protected $listeners = ['saveAbono' => 'storeAbono'];
    public function mount(Prestamo $id_prestamo)
    {

        $this->prestamo = $id_prestamo;
    }
    public function storeAbono($monto, $fecha,$cantidad)
    {
        $error = validar([
            'monto' => [
                $monto,
                'required|numeric|min:0',
                ['numeric' => 'Ingrese un numero valido', 'min' => 'El monto debe ser mayor a 0']
            ],
            'fecha' => [
                $fecha,
                'required|date|after_or_equal:' . $this->prestamo->created_at,
                ['after_or_equal' => 'La fecha no puede ser menor o igual al dia de creacion del prestamo']
            ],
            'cantidad' => [
                $cantidad,
                'required|min:1|max:5',
            ]
        ]);
        if (!$error) {
            $contador=0;
            for ($i=0; $i < $cantidad; $i++) {
                $siExiste=Abono::where('prestamo_id',$this->prestamo->id)->where('fecha',$fecha)->first();
                // dd(array_search($fecha,$this->dias));
                $existeFecha=array_search($fecha,$this->dias);
                // dd($siExiste);
                if($existeFecha!=false && $fecha < getCurrentCaja()->fecha_final && !$siExiste)
                {
                    Abono::create([
                        'monto_abono' => $monto,
                        'fecha' => $fecha,
                        'prestamo_id' => $this->prestamo->id,
                    ]);
                }
                else
                {
                    $contador++;
                }
               $fecha=Carbon::parse($fecha)->addDay();
            }
               
            
            
            $usuario = User::find($this->prestamo->user_id);
            if ($this->prestamo->abonos->count() >= $this->prestamo->dias) {
                $this->prestamo->estado_id = 3;
                $this->prestamo->save();
            }
            // $toast = [
            //     'icon' => 'success',
            //     'title' => 'Abono creado exitosamente!'
            // ];
            // $this->emit('resetModal');
            if($contador>0)
            {
                return redirect()->route('cobrador.abono.add', $this->prestamo->id)->with('warning', $cantidad-$contador.' abono(s) creado(s), '.$contador.' ignorados');
            }
            else
            {
                return redirect()->route('cobrador.abono.add', $this->prestamo->id)->with('success', 'Abono(s) creado(s) exitosamente!');

            }
        } else {

            $toast = [
                'icon' => 'error',
                'title' => $error
            ];
        }
        $this->emit('toastDispatch', $toast);
    }
    public function render()
    {
        $array = [];
        $this->dias = getDiasHabiles(Carbon::parse($this->prestamo->created_at)->addDay(), Carbon::parse($this->prestamo->fecha_final)->addDays(retrasosPrestamoUser($this->prestamo->user_id, $this->prestamo->id) + 1));
        $registros = $this->prestamo->abonos;
        foreach ($this->dias as $dia) {
            $fechasAbonadas = $registros->where('fecha', $dia);
            if ($fechasAbonadas->count() > 0) {
                foreach ($fechasAbonadas as $abono) {
                    $fecha = [
                        'start' => $abono->fecha,
                        'end' => $abono->fecha,
                        'color' => '#00dd3d',
                        'title' => $abono->monto_abono
                    ];
                    array_push($array, $fecha);
                }
            } else {
                if ($dia >= Carbon::now()) {
                    $titulo = 'pendiente';
                    $color = 'orange';
                } else {
                    $titulo = 'retraso';
                    $color = 'red';
                }
                $fecha = [
                    'start' => $dia,
                    'end' => $dia,
                    'color' => $color,
                    'title' => $titulo
                ];
                array_push($array, $fecha);
            }
        }

        $this->calendario = json_encode($array);
        return view('livewire.cobrador.add-abono-component')->section('content')->extends('cobranza.master');
    }
}
