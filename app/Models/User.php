<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Estado;
use App\Models\Prestamo;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    const PATH_FOTO_DEFAULT = '';
    protected $appends = array('icono', 'retrasos', 'color','full_name');
    protected $fillable = [
        'id',
        'name',
        'apellido',
        'email',
        'password',
        'foto',
        'prom_retrasos',
        'ci',
        'telf',
        'direccion',
        'lat',
        'long',
        'estado_id',
        'role_id',
        'billetera'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function setPasswordAttribute($value)
    {
        $this->attributes["password"] = Hash::make($value);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
    public function gastos()
    {
        return $this->hasMany(Gasto::class);
    }
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }
    public function prestamosPendientes()
    {
        return $this->hasMany(Prestamo::class)->where('estado_id', 2);
    }

    public function getIconoAttribute()
    {
        $dias = retrasosPrestamoUser($this->id);
        if ($dias <= 10) {
            $icono = asset('assets/images/person-black.png');
        } elseif ($dias >= 11  &&  $dias <= 20) {
            $icono = asset('assets/images/person-orange.png');
        } else if ($dias > 20) {
            $icono = asset('assets/images/person-red.png');
        }
        return $icono;
    }
    public function getColorAttribute()
    {
        $dias = retrasosPrestamoUser($this->id);
        if ($dias <= 10) {
            $color = 'black';
        } elseif ($dias >= 11  &&  $dias <= 20) {
            $color = 'orange';
        } else if ($dias > 20) {
            $color = 'red';
        }
        return $color;
    }
    public function getFotoAttribute($value)
    {
        if($value==null || $value=='')
        {
            return 'assets/img/person.png';
        }
        return $value;
    }

    public function getRetrasosAttribute()
    {
        $dias = retrasosPrestamoUser($this->id);
        return $dias;
    }
    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->apellido;
    }

    public static function getCurrentUser()
    {
        return self::findOrFail(auth()->user()->id);
    }
}
