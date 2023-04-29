<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CajaSemanal extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_inicial',
        'monto_inicial',
        'fecha_final',
        'monto_final',
        'estado_id',
        'cobrador_id'
    ];
}
