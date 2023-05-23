<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Abono;
use App\Models\CajaSemanal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestamo extends Model
{
    use HasFactory;
    protected $appends = array('nombreDia', 'estadoHoy', 'colorHoy', 'numeroHoy', 'iconoHoy', 'user');
    protected $fillable = [
        'user_id',
        'cobrador_id',
        'monto_inicial',
        'monto_final',
        'fecha_final',
        'cuota',
        'interes',
        'dias',
        'dias_por_semana',
        'retrasos',
        'estado_id',
        'caja_id',
        'fecha',
        'created_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getUserAttribute()
    {
        return User::find($this->user_id);
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
    public function colorEstado()
    {
        switch ($this->estado_id) {
                // case 1:
                //     return 'success';
            case 2:
                return 'warning';
            case 3:
                return 'success';

            default:
                return 'primary';
        }
    }
    public function abonos()
    {
        return $this->hasMany(Abono::class);
    }
    public function abonosFallidos()
    {
        return $this->hasMany(AbonoFallido::class);
    }
    public function getFechaFinalAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
    public function getMontoFinalAttribute($value)
    {
        return floatval($value);
    }
    public function getMontoInicialAttribute($value)
    {
        return floatval($value);
    }
    public function getInteresAttribute($value)
    {
        return floatval($value);
    }
    public function getCuotaAttribute($value)
    {
        return floatval($value);
    }
    public function idFolio()
    {
        return str_pad($this->id, 5, '0', STR_PAD_LEFT);
    }
    public function cuotasRestantes()
    {
        return $this->dias - $this->abonos->count();
    }
    public function gananciaPrestamo()
    {
        return $this->monto_final - $this->monto_inicial;
    }
    public function porcentajeProgreso()
    {

        return number_format($this->abonos->sum('monto_abono') * 100 / $this->monto_final);
    }
    public function colorProgresoBar()
    {
        if ($this->porcentajeProgreso() < 20) {
            return 'danger';
        } else if ($this->porcentajeProgreso() >= 20 && $this->porcentajeProgreso() <= 50) {
            return 'warning';
        } else if ($this->porcentajeProgreso() > 50 && $this->porcentajeProgreso() <= 75) {
            return 'info';
        } else {
            return 'success';
        }
    }
    public function diasFaltantes()
    {
        if (strtotime($this->fecha_final) < strtotime(Carbon::now()->format('Y-m-d'))) {
            return '<span class="text-danger">Expirado hace ' . Carbon::parse($this->fecha_final)->diffInDays(Carbon::now()) . ' dia(s)</span>';
        } else {
            return '<span class="text-success">Faltan  ' . Carbon::parse($this->fecha_final)->diffInDays(Carbon::now()) . ' dia(s)</span>';
        }
    }

    public function getNombreDiaAttribute()
    {
        $fecha = $this->created_at;
        $nombreDia = Carbon::parse($fecha)->locale('es')->isoFormat('dddd');
        return ucfirst($nombreDia);
    }
    public function estadoAbonoHoy()
    {
        if ($this->abonos->where('fecha', date('Y-m-d'))->count() > 0) {
            return 'green';
        } else if ($this->abonosFallidos->where('fecha', date('Y-m-d'))->count() > 0) {
            return 'red';
        } else {
            return 'silver';
        }
    }
    public function getEstadoHoyAttribute()
    {
        if ($this->abonos->where('fecha', date('Y-m-d'))->count() > 0) {
            return 'Pagado hoy';
        } else if ($this->abonosFallidos->where('fecha', date('Y-m-d'))->count() > 0) {
            return 'Anulado hoy';
        } else {
            return 'Pendiente';
        }
    }
    public function getColorHoyAttribute()
    {
        if ($this->abonos->where('fecha', date('Y-m-d'))->count() > 0) {
            return 'success';
        } else if ($this->abonosFallidos->where('fecha', date('Y-m-d'))->count() > 0) {
            return 'danger';
        } else {
            return 'warning';
        }
    }

    public function getNumeroHoyAttribute()
    {
        if ($this->abonos->where('fecha', date('Y-m-d'))->count() > 0) {
            return 2;
        } else if ($this->abonosFallidos->where('fecha', date('Y-m-d'))->count() > 0) {
            return 3;
        } else {
            return 1;
        }
    }
    public function getIconoHoyAttribute()
    {
        if ($this->abonos->where('fecha', date('Y-m-d'))->count() > 0) {
            return 'fa fa-check';
        } else if ($this->abonosFallidos->where('fecha', date('Y-m-d'))->count() > 0) {
            return 'fa fa-warning';
        } else {
            return 'fa fa-money-bill-transfer';
        }
    }
    public function caja()
    {
        return $this->belongsTo(CajaSemanal::class);
    }
    public function getTarjetasFinalizadas()
    {
        return floor($this->abonos->sum('monto_abono') / $this->cuota);
    }
    public function getArrayTarjetas()
    {
        $array = collect();
        $restante = 0;
        $cuota = $this->cuota;
        $cantidadAbonos = $this->abonos->count();
        $cont = 0;
        $dias = getDiasHabiles(Carbon::parse($this->fecha)->addDay(), Carbon::parse($this->fecha_final));
        foreach ($this->abonos->sortBy('fecha') as $abono) {
            if ($restante > 0) {
                $falta = $cuota - $restante;
                $abono->monto_abono = $abono->monto_abono - $falta;
                // array_push($array, [$cuota => $abono->fecha]);
                $array->push([
                    'cuota'=>$cuota,
                    'fecha'=>$abono->fecha,
                    'color'=>'success',
                    'estado'=>'Finalizado',
                    'icono'=>'fa fa-check'
                ]);
                array_splice($dias, 0, 1);
            }
            $tarjetas = floor($abono->monto_abono / $this->cuota);
            for ($i = 0; $i < $tarjetas; $i++) {
                // array_push($array, [$cuota => $abono->fecha]);
                $array->push([
                    'cuota'=>$cuota,
                    'fecha'=>$abono->fecha,
                    'color'=>'success',
                    'estado'=>'Finalizado',
                    'icono'=>'fa fa-check'
                ]);
                array_splice($dias, 0, 1);
            }

            $restante = $abono->monto_abono % $this->cuota;
            // unset($dias[0]);
            
            $cont++;
            if ($cont >= $cantidadAbonos && $restante>0) {
                // array_push($array, [$restante => $abono->fecha]);
                $array->push([
                    'cuota'=>$restante,
                    'fecha'=>$abono->fecha,
                    'color'=>'warning',
                    'estado'=>'En curso',
                    'icono'=>'fa fa-warning'
                ]);
                array_splice($dias, 0, 1);
            }
        }
        foreach($dias as $fecha)
        {
            // array_push($array, ['0' => $fecha]);
            $array->push([
                'cuota'=>0,
                'fecha'=>$fecha,
                'color'=>'danger',
                'estado'=>'Pendiente',
                'icono'=>'fa fa-hourglass'
            ]);
        }
       return $array;
    }
}
