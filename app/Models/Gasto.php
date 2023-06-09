<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gasto extends Model
{
    use HasFactory;
    protected $appends = array('nombreDia');
    protected $fillable = [
        'user_id',
        'monto',
        'descripcion',
        'caja_id',
        'fecha'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getNombreDiaAttribute()
    {
        $fecha = $this->created_at;
        $nombreDia = Carbon::parse($fecha)->locale('es')->isoFormat('dddd');
        return ucfirst($nombreDia);
    }
}
