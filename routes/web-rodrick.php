<?php

use App\Http\Livewire\Admin\UserCrudComponent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('cobranza.tic-tac-toe');
});
//Rutas generales xhttps
Route::middleware(['auth'])->group(function () {
    //Rutas admin
    Route::middleware([])->name('admin.')->prefix('admin')->group(function () {

        Route::name('user.')->prefix('user')->group(function () {
            Route::get('/list', UserCrudComponent::class)->name('list');
            Route::get('/create', UserCrudComponent::class)->name('create');
            Route::get('/pendiente', UserCrudComponent::class)->name('pendiente');
        });
    });
    //Rutas cobrador
    Route::middleware(['cobrador'])->name('cobrador.')->prefix('cobrador')->group(function () {
    });
});
//Rutas ajax
Route::middleware(['auth', 'ajax'])->name('ajax.')->group(function () {
    //Rutas admin
    Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function () {
    });
    //Rutas cobrador
    Route::middleware(['cobrador'])->name('cobrador.')->prefix('cobrador')->group(function () {
    });
});

Route::get('create/user/cotave', function () {
    User::create([
        'name' => 'Mario',
        'email' => 'maritojhefi@gmail.com',
        'role_id' => 1,
        'estado_id' => 1,
        'foto' => 'foto.png',
        'ci' => '10655058871',
        'telf' => '75141235',
        'direccion' => 'b/San Antonio',
        'lat' => '-21.5252132',
        'long' => '-64.7518157',
        'password' => 'jhefi123',
    ]);
});
