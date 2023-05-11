<?php

use Carbon\Carbon;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Cobrador\AbonoComponent;
use App\Http\Livewire\Cobrador\MetasComponent;
use App\Http\Livewire\Cobrador\ReporteComponent;
use App\Http\Livewire\Cobrador\AddAbonoComponent;
use App\Http\Livewire\Cobrador\BilleteraComponent;
use App\Http\Controllers\Cobrador\InicioController;
use App\Http\Livewire\Cobrador\ListReporteComponent;
use App\Http\Livewire\Cobrador\PrestamoCrudComponent;

Route::get('/admin/debounce', function () {
    request()->session()->flash('success', 'Raton!');
    return view('cobranza.pruebas.debounce');
})->name('debounce');
//Rutas generales http
Route::middleware(['auth'])->group(function () {
    //Rutas admin
    Route::middleware([])->name('admin.')->prefix('admin')->group(function () {
    });
    //Rutas cobrador
    Route::middleware([])->name('cobrador.')->prefix('cobrador')->group(function () {
        Route::get('/inicio', [InicioController::class,'index'])->name('inicio');
        Route::get('/prestamos', PrestamoCrudComponent::class)->name('prestamo');
        Route::get('/abono', AbonoComponent::class)->name('abono');
        Route::get('/abono/add/{id_prestamo}', AddAbonoComponent::class)->name('abono.add');
        Route::get('/metas', MetasComponent::class)->name('metas');
        Route::get('/billetera', BilleteraComponent::class)->name('billetera');
        Route::get('/reporte/{cajaSemanal}', ReporteComponent::class)->name('reporte');
        Route::get('/reporte/lista/all', ListReporteComponent::class)->name('lista.reporte');
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




