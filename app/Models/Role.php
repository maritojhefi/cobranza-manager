<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    
    const ROL1="administrador";
    const ROL2="supervisor";
    const ROL3="cobrador";
    const ROL4="cliente";

    protected $fillable = [
        'nombre',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    
}
