<?php

use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;


Route::get('/admin/debounce', function () {
    request()->session()->flash('success', 'Raton!');
    return view('cobranza.pruebas.debounce');
})->name('debounce');
//Rutas generales http
Route::middleware(['auth'])->group(function () {
    //Rutas admin
    Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function () {
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

Route::middleware([])->name('extra.')->prefix('extras')->group(function () {
    Route::get('/personalizacion', function () {
        return view('cobranza.extras.ajustes');
    })->name('personalizacion');
});
