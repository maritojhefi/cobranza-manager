<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gasto extends Model
{
    use HasFactory;
    protected $appends = array('fecha');
    protected $fillable = [
        'user_id',
        'monto',
        'descripcion',
        'caja_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getFechaAttribute()
    {
        return Carbon::parse($this->created_at)->format('Y-m-d');
    }
    
}
