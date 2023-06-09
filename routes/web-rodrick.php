<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\UserMapComponent;
use App\Http\Livewire\Admin\UserCrudComponent;
use App\Http\Livewire\Admin\UserListComponent;
use App\Http\Livewire\Admin\CobradorAumentoMonto;
use App\Http\Livewire\Admin\VerGastosAdminComponent;
use App\Http\Livewire\Admin\CobradorAumentoComponent;
use App\Http\Livewire\Cobrador\CobradorGastoComponent;
use App\Http\Livewire\Cobrador\ResetPasswordComponent;
use App\Http\Livewire\Cobrador\VerGastoCobradorSemana;
use App\Http\Livewire\Admin\CobradorGastoAdminComponent;
use App\Http\Livewire\Cobrador\CobradorAbonoReportComponent;
use App\Http\Livewire\Cobrador\CobradorGastoReportComponent;
use App\Http\Livewire\Cobrador\CobradorPrestadoReportComponent;
use App\Http\Livewire\Cobrador\VerGastoCobradorSemanaComponent;

Route::get('/', function () {
    return view('cobranza.tic-tac-toe');
});
//Rutas generales xhttps
Route::middleware(['auth'])->group(function () {
    //Rutas admin
    Route::middleware([])->name('admin.')->prefix('admin')->group(function () {

        Route::name('user.')->prefix('user')->group(function () {
            Route::get('/list/{role_id}', UserListComponent::class)->name('list');
            Route::get('/create/{role_id}', UserCrudComponent::class)->name('create');
            Route::get('/pendiente/{role_id}', UserListComponent::class)->name('pendiente');
        });
        Route::name('cobrador.')->prefix('cobrador')->group(function () {
            Route::get('/list/{role_id}', UserListComponent::class)->name('list');
            Route::get('/create/{role_id}', UserCrudComponent::class)->name('create');
            Route::get('/aumento/historial', CobradorAumentoComponent::class)->name('historial');
        });
        Route::name('gasto.')->prefix('gasto')->group(function () {
            Route::get('/ver/gastos/cobradores', VerGastosAdminComponent::class)->name('historial');
            Route::get('/gasto/cobrador', CobradorGastoAdminComponent::class)->name('cobrador');
        });

        Route::get('/maps/user/all', UserMapComponent::class)->name('maps.user');
        Route::get('/user/map/single/{idUser}', function ($idUser) {
            $user = User::find($idUser);
            return view('livewire.admin.user-single-map', compact('user'));
        })->name('single.map');
    });
    //Rutas cobrador
    Route::middleware([])->name('cobrador.')->prefix('cobrador')->group(function () {
        Route::name('user.')->prefix('user')->group(function () {
            Route::get('/list/{role_id}', UserListComponent::class)->name('list');
            Route::get('/create/{role_id}', UserCrudComponent::class)->name('create');
            Route::get('/pendiente/{role_id}', UserListComponent::class)->name('pendiente');
        });
        Route::name('gasto.')->prefix('gasto')->group(function () {
            Route::get('/nuevo', CobradorGastoComponent::class)->name('create');
            Route::get('/reporte/{caja}', CobradorGastoReportComponent::class)->name('report');
            Route::get('/reporte/ver/todo', VerGastoCobradorSemanaComponent::class)->name('todo');
        });
        Route::get('/change/password', ResetPasswordComponent::class)->name('reset');
        Route::get('/prestado/report/{caja?}', CobradorPrestadoReportComponent::class)->name('report');
        Route::get('/abono/report/{caja?}', CobradorAbonoReportComponent::class)->name('abonos.all');
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