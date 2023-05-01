<?php

namespace App\Http\Controllers\Cobrador;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InicioController extends Controller
{
    public function index()
    {
        $user=User::find(auth()->id());
        return view('cobranza.cobrador.inicio.index',compact('user'));
    }
}
