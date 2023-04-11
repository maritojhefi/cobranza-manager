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
}
