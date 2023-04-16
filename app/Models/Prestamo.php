<?php

namespace App\Models;

use App\Models\User;
use App\Models\Abono;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestamo extends Model
{
    use HasFactory;
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
        'estado_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function prestamos()
    {
        return $this->hasMany(Abono::class);
    }
}
