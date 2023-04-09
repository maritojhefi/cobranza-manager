<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('cobranza.tic-tac-toe');
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
