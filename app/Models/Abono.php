<?php

namespace App\Models;

use App\Models\Prestamo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Abono extends Model
{
    use HasFactory;
    protected $fillable = [
        'prestamo_id',
        'monto_abono',
        'fecha',
        'long',
        'lat',
        'caja_id'
    ];
    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class);
    }
}
