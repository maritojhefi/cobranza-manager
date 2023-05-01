<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MontoCobrador extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'monto_actual',
        'monto_aumento',
        'monto_total'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
