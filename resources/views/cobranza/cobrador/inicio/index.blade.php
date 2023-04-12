@extends('cobranza.master')
@section('content')
    <x-elementos.welcome-user-component />
    @livewire('tarjeta-resumen-component')
    <x-elementos.alert-timing-card-component />
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="darkmodeswitch">
                        <label class="form-check-label text-muted px-2 " for="darkmodeswitch">Activar modo oscuro
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-elementos.chart-tarjetas-resumen-component/>
@endsection
