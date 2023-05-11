<?php

namespace App\Models;

use App\Models\Abono;
use App\Models\Gasto;
use App\Models\Prestamo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CajaSemanal extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_inicial',
        'monto_inicial',
        'fecha_final',
        'monto_final',
        'estado_id',
        'cobrador_id',
        'created_at'
    ];
    public function abonos()
    {
        return $this->hasMany(Abono::class,'caja_id');
    }
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class,'caja_id');
    }
    public function gastos()
    {
        return $this->hasMany(Gasto::class,'caja_id');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
