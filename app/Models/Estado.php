<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Estado extends Model
{
    use HasFactory;
    const ESTADO_PENDIENTE = "pendiente";
    const ESTADO_FINALIZADO = "finalizado";
    const ESTADO_LIMPIO = "sin prestamos";
    const ESTADO_ACTIVO = "activo";

    const ID_ACTIVO = 4;
    const ID_PENDIENTE = 2;
    const ID_FINALIZADO = 3;
    const ID_LIMPIO = 1;

    protected $fillable = [
        'nombre',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function getNombreEstadoAttribute($value)
    {
        return ucfirst($value);
    }
    public function colorEstado()
    {
        switch ($this->id) {
            case 4:
                return 'success';
            case 2:
                return 'warning';
            default:
                return 'warning';
        }
    }
}
