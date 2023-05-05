<div>
    <div>
        <div class="row">
            <p>
                Gastos de {{ isset($caja) ? 'la semana actual' : 'todas las semanas' }}
            </p>
            @foreach ($arrayCajas as $array)
                @foreach ($array as $caja)
                    <div class="shadow-sm mb-4 gasto-lista" type="button" id="" wire:click="mostrarGasto('{{$caja->id}}')">
                        <div class="card theme-bg text-white text-center">
                            <div class="card-body">
                                <p class="text-muted">({{ date('y-m-d', strtotime($caja->fecha_inicial)) }} hasta
                                    {{ date('y-m-d', strtotime($caja->fecha_final)) }} ) </p>
                                <h4 class="display-1" style="font-size: 22px;">
                                    {{ number_format($registros[$caja->id]->sum('monto'), 2, ',', ' ') }} Bs.
                                </h4>
                                <p class="text-muted mb-2 size-12">Gasto Total de la Semana <span
                                        class="text-muted mr-2">({{ $registros[$caja->id]->count() }}
                                        gastos)</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>




{{-- @foreach ($registros as $item)
                <div class="shadow-sm mb-4 gasto-lista" type="button" id=""
                    wire:click="mostrarGasto('{{ $item->id }}')">
                    <div class="card theme-bg text-white text-center">
                        <div class="card-body">
                            <p class="text-muted">({{ date('y-m-d', strtotime($cajaSeleccionada->fecha_inicial)) }} hasta
                                {{ date('y-m-d', strtotime($cajaSeleccionada->fecha_final)) }} ) </p>
                            <h4 class="display-1" style="font-size: 22px;">
                                {{ number_format($registros->sum('monto'), 2, ',', ' ') }} Bs.</h4>
                            <p class="text-muted mb-2 size-12">Gasto Total de la Semana <span
                                    class="text-muted mr-2">({{ $registros->count() }}
                                    gastos)</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach --}}
