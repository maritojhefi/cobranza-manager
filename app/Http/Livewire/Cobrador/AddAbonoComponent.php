<?php

namespace App\Http\Livewire\Cobrador;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Abono;
use App\Models\AbonoFallido;
use Livewire\Component;
use App\Models\Prestamo;

class AddAbonoComponent extends Component
{
    public $prestamo, $calendario, $dias, $motivosNoPago,$tarjetasFinalizadas;
    protected $listeners = ['saveAbono' => 'storeAbono', 'saveAbonoFallido' => 'storeAbonoFallido', 'eliminarPrestamo' => 'eliminarPrestamo'];
    public function mount(Prestamo $id_prestamo)
    {
        $this->motivosNoPago = AbonoFallido::MOTIVOSNOPAGO;
        $this->prestamo = $id_prestamo;
    }
    public function eliminarPrestamo(Prestamo $prestamo)
    {
        try {
            if ($prestamo) {
                $abonos = $prestamo->abonos()->get();
                foreach ($abonos as $abono) {
                    $abono->delete();
                }
                // $prestamo->abonos()->delete();
                $prestamo->delete();
                return redirect()->route('cobrador.abono', ['user_id' => $this->prestamo->user_id])->with('success', 'El prestamo y los abonos fueron borrados con exito!');
            }
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            $toast = [
                'icon' => 'error',
                'title' => 'hubo un problema al intentar borrar el prestamo, intente nuevamente'
            ];
            $this->emit('toastDispatch', $toast);
        }
    }
    public function storeAbonoFallido($motivo, $fecha)
    {
        $error = validar([
            'motivo' => [
                $motivo,
                'required|string',
            ],
            'fecha' => [
                $fecha,
                'required|date|after_or_equal:' . $this->prestamo->fecha,
                ['after_or_equal' => 'La fecha no puede ser menor o igual al dia de creacion del prestamo']
            ],
        ]);
        if (!$error) {
            $siExiste = AbonoFallido::where('fecha', $fecha)->where('prestamo_id', $this->prestamo->id)->first();
            $siExisteAbono = Abono::where('prestamo_id', $this->prestamo->id)->where('fecha', $fecha)->first();
            if (!$siExiste && !$siExisteAbono) {
                AbonoFallido::create([
                    'fecha' => Carbon::today(),
                    'motivo' => $motivo,
                    'prestamo_id' => $this->prestamo->id
                ]);
                return redirect()->route('cobrador.abono', ['user_id' => $this->prestamo->user_id])->with('success', 'Registrado exitosamente');
            } else if ($siExiste && !$siExisteAbono) {
                $siExiste->motivo = $motivo;
                $siExiste->save();
                return redirect()->route('cobrador.abono', ['user_id' => $this->prestamo->user_id])->with('info', 'Informacion actualizada');
            }
            return redirect()->route('cobrador.abono.add', $this->prestamo->id)->with('warning', 'Ya existe un abono registrado, operacion cancelada');
        } else {
            $toast = [
                'icon' => 'error',
                'title' => $error
            ];
            $this->emit('toastDispatch', $toast);
        }
    }
    public function storeAbono($monto, $fecha)
    {
        $error = validar([
            'monto' => [
                $monto,
                'required|numeric|min:0',
                ['numeric' => 'Ingrese un numero valido', 'min' => 'El monto debe ser mayor a 0']
            ],
            'fecha' => [
                $fecha,
                'required|date|after_or_equal:' . $this->prestamo->fecha,
                ['after_or_equal' => 'La fecha no puede ser menor o igual al dia de creacion del prestamo']
            ],

        ]);
        if (!$error) {
            $contador = 0;

            // $siExiste = Abono::where('prestamo_id', $this->prestamo->id)->where('fecha', $fecha)->first();
            AbonoFallido::where('prestamo_id', $this->prestamo->id)->where('fecha', $fecha)->delete();
            // dd(array_search($fecha,$this->dias));
            // $existeFecha = array_search($fecha, $this->dias);
            //  dd($existeFecha);
            if ($fecha < getCurrentCaja()->fecha_final) {
                Abono::create([
                    'monto_abono' => $monto,
                    'fecha' => $fecha,
                    'prestamo_id' => $this->prestamo->id,
                ]);
                // } else {
                //     // dd(is_numeric($existeFecha),$fecha < getCurrentCaja()->fecha_final,!$siExiste);
                //     $contador++;
                // }
                $fecha = Carbon::parse($fecha)->addDay()->format('Y-m-d');

                $this->prestamo = Prestamo::find($this->prestamo->id);
                if ($this->prestamo->abonos->sum('monto_abono') >= $this->prestamo->monto_final) {
                    $this->prestamo->estado_id = 3;
                    $this->prestamo->save();
                }
                $toast = [
                    'icon' => 'success',
                    'title' => 'Abono creado exitosamente!'
                ];
                $this->emit('toastDispatch', $toast);
            } else {

                $toast = [
                    'icon' => 'error',
                    'title' => $error
                ];
            }
            $this->emit('toastDispatch', $toast);
        }
    }
    public function render()
    {
        $array = [];
        $this->dias = getDiasHabiles(Carbon::parse($this->prestamo->fecha)->addDay(), Carbon::parse($this->prestamo->fecha_final)->addDays(retrasosPrestamoUser($this->prestamo->user_id, $this->prestamo->id) + 1));
        $registros = $this->prestamo->abonos;
        $this->tarjetasFinalizadas = $registros->sum('monto_abono') / $this->prestamo->cuota;
        $registrosFallidos = $this->prestamo->abonosFallidos;
        $contRetrasos = 0;
        // foreach ($this->dias as $dia) {
        //     $fechasAbonadas = $registros->where('fecha', $dia);
        //     $fechaFallida = $registrosFallidos->where('fecha', $dia)->first();
        //     if($fechaFallida)
        //     {
        //         $fecha = [
        //             'start' => $fechaFallida->fecha,
        //             'end' => $fechaFallida->fecha,
        //             'color' => 'red',
        //             'title' => $fechaFallida->motivo
        //         ];
        //         array_push($array, $fecha);
        //     }
        //     else if ($fechasAbonadas->count() > 0) {
        //         foreach ($fechasAbonadas as $abono) {
        //             $fecha = [
        //                 'start' => $abono->fecha,
        //                 'end' => $abono->fecha,
        //                 'color' => '#00dd3d',
        //                 'title' => $abono->monto_abono
        //             ];
        //             array_push($array, $fecha);
        //         }
        //     } else {
        //         if ($dia >= date('Y-m-d')) {
        //             $titulo = 'pendiente';
        //             $color = 'orange';
        //         } else {

        //             $contRetrasos++;
        //             $titulo = 'retraso';
        //             $color = 'silver';
        //         }
        //         $fecha = [
        //             'start' => $dia,
        //             'end' => $dia,
        //             'color' => $color,
        //             'title' => $titulo
        //         ];
        //         array_push($array, $fecha);
        //     }
        // }

        $this->prestamo->retrasos = $contRetrasos;
        $this->prestamo->save();
        $this->calendario = json_encode($array);
        return view('livewire.cobrador.add-abono-component')->section('content')->extends('cobranza.master');
    }
}