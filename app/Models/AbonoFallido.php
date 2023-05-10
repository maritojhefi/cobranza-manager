<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbonoFallido extends Model
{
    use HasFactory;
    const MOTIVOSNOPAGO=["No esta","Se viajo","Cambio de casa","Se enfermo","No tiene dinero"];
   
    protected $fillable = [
        'fecha',
        'prestamo_id',
        'motivo'
    ];
}
