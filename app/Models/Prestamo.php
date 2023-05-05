<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Abono;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestamo extends Model
{
    use HasFactory;
    protected $appends = array('fecha');
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
        'caja_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
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

        return number_format($this->abonos->count() * 100 / $this->dias);
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
        if ($this->fecha_final < Carbon::now()) {
            return '<span class="text-danger">Expirado hace ' . Carbon::parse($this->fecha_final)->diffInDays(Carbon::now()) . ' dia(s)</span>';
        } else {
            return '<span class="text-success">Faltan  ' . Carbon::parse($this->fecha_final)->diffInDays(Carbon::now()) . ' dia(s)</span>';
        }
    }
    public function getFechaAttribute()
    {
        return Carbon::parse($this->created_at)->format('Y-m-d');
    }
}
