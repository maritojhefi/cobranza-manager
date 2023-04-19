<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\UserCrudComponent;
use App\Http\Livewire\Admin\UserListComponent;
use App\Http\Livewire\Admin\UserMapComponent;

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
        });

        Route::get('/maps/user/all', UserMapComponent::class)->name('maps.user');
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
