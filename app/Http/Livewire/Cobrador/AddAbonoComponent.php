<?php

namespace App\Http\Livewire\Cobrador;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Abono;
use Livewire\Component;
use App\Models\Prestamo;

class AddAbonoComponent extends Component
{
    public $prestamo, $calendario;
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
                'required|date|after:' . $this->prestamo->created_at,
                ['after' => 'La fecha no puede ser menor al dia de creacion del prestamo']
            ],
            'cantidad' => [
                $cantidad,
                'required|min:1|max:5',
            ]
        ]);
        if (!$error) {
            Abono::create([
                'monto_abono' => $monto,
                'fecha' => $fecha,
                'prestamo_id' => $this->prestamo->id,
            ]);
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
            return redirect()->route('cobrador.abono.add', $this->prestamo->id)->with('success', 'Abono creado exitosamente!');
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
        $dias = getDiasHabiles(Carbon::parse($this->prestamo->created_at)->addDay(), Carbon::parse($this->prestamo->fecha_final)->addDays(retrasosPrestamoUser($this->prestamo->user_id, $this->prestamo->id) + 1));
        $registros = $this->prestamo->abonos;
        foreach ($dias as $dia) {
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
