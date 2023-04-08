<?php

use Illuminate\Support\Facades\Route;

Route::get('/asd', function () {
    return view('cobranza.admin.prueba');
});

Route::get('/debounce', function () {
    return view('cobranza.admin.debounce');
});
//Rutas generales xhttps
Route::middleware(['auth'])->name('')->prefix('')->group(function () {
    //Rutas admin
    Route::middleware(['admin'])->name('')->prefix('')->group(function () {
    });
    //Rutas cobrador
    Route::middleware(['cobrador'])->name('')->prefix('')->group(function () {
    });
});
//Rutas ajax
Route::middleware(['auth', 'ajax'])->name('')->prefix('')->group(function () {
    //Rutas admin
    Route::middleware(['admin'])->name('')->prefix('')->group(function () {
    });
    //Rutas cobrador
    Route::middleware(['cobrador'])->name('')->prefix('')->group(function () {
    });
});
