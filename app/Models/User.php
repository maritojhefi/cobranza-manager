<?php

namespace App\Models;

use Carbon\Carbon;
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
    protected $appends = array('icono', 'retrasos', 'color', 'full_name', 'prestamos_cantidad');
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
    public function gastosSemana()
    {
        $fechas = startEndWeek(Carbon::now());
        return $this->hasMany(Gasto::class)->whereBetween('created_at', [$fechas[0], $fechas[1]]);
    }
    public function prestamos()
    {
        if (auth()->user()->role_id == 1) {
            return $this->hasMany(Prestamo::class);
        } else {
            return $this->hasMany(Prestamo::class)->where('cobrador_id', auth()->id());
        }
    }
    public function getPrestamosCantidadAttribute()
    {
        return $this->hasMany(Prestamo::class)->where('estado_id', 2)->where('cobrador_id', auth()->id())->count();
    }
    public function prestamosPendientes()
    {
        if (auth()->user()->role_id == 1) {
            return $this->hasMany(Prestamo::class)->where('estado_id', 2);
        } else {
            return $this->hasMany(Prestamo::class)->where('estado_id', 2)->where('cobrador_id', auth()->id());
        }
    }
    public function prestamosSemana()
    {
        $fechas = startEndWeek(Carbon::now());
        return $this->hasMany(Prestamo::class, 'cobrador_id')->where('estado_id', 2)->where('cobrador_id', auth()->id())->whereBetween('created_at', [$fechas[0], $fechas[1]]);
    }

    public function getIconoAttribute()
    {
        $dias = retrasosPrestamoUser($this->id);
        if ($dias <= 10) {
            $icono = asset('assets/images/person-black.png');
        } elseif ($dias >= 11 && $dias <= 20) {
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
            $color = '#464749';
        } elseif ($dias >= 11 && $dias <= 20) {
            $color = '#ff9800';
        } else if ($dias > 20) {
            $color = '#f2574b';
        }
        return $color;
    }
    public function getFotoAttribute($value)
    {
        if ($value == null || $value == '') {
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
    public function getPromRetrasosAttribute($value)
    {
        return floatval(number_format($value, 1));
    }
    public static function getCurrentUser()
    {
        return self::findOrFail(auth()->user()->id);
    }
}