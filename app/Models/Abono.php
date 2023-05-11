<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Prestamo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Abono extends Model
{
    use HasFactory;
    protected $appends = array('nombreDia', 'fechaFormateada', 'fechaCreada');
    protected $fillable = [
        'prestamo_id',
        'monto_abono',
        'fecha',
        'long',
        'lat',
        'caja_id',
        'created_at'
    ];
    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class);
    }
    public function getNombreDiaAttribute()
    {
        $fecha = $this->created_at;
        $nombreDia = Carbon::parse($fecha)->locale('es')->isoFormat('dddd');
        return ucfirst($nombreDia);
    }
    public function getFechaFormateadaAttribute()
    {
        $fechaFormateada = fechaFormateada(4, $this->fecha);
        return $fechaFormateada;
    }
    public function getFechaCreadaAttribute()
    {
        $fechaCreada = fechaFormateada(2, $this->created_at);
        return $fechaCreada;
    }
}
