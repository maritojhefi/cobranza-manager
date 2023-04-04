<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    
    const ROL1="administrador";
    const ROL2="supervisor";
    const ROL3="cobrador";
    const ROL4="cliente";
}
