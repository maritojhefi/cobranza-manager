<div>
    <div class="row">
        <p>
            Gastos de {{ $caja ? 'la semana actual' : 'las semanas' }}
        </p>
        <div class="shadow-sm mb-4 gasto-lista" type="button" id=""
            wire:click="mostrarGasto('{{ $registros }}')">
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


        {{-- <div>
    @foreach ($diasSemana as $dia)
        <h2>{{ $dia }}</h2>

        @foreach ($pagosPorDia[$loop->iteration + 1] as $pago)
            <p>{{ $pago->concepto }}</p>
            <p>{{ $pago->monto }}</p>
        @endforeach
    @endforeach
</div> --}}


    </div>

    @push('modals')
        <div class="modal fade" id="modalVerGastoSemana" tabindex="-1" aria-labelledby="modalCreateGastoLabel"
            style="display: none;" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h3 class="text-color-theme mb-2">Gastos de la semana</h3>
                        <div class="lista-gasto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endpush


    @push('footer')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script>
            Livewire.on('mostrarSemana', data => {
console.log(data)
                var data = $.parseJSON(data);
                $('#modalVerGastoSemana').modal('show');
                $('.lista-gasto').empty();
                data.forEach(function(gasto, index) {
                    var fecha = gasto.created_at;
                    $('.lista-gasto').append(
                        '<div class="list-group list-group-flush bg-none col-12 px-0 card"><a class="list-group-item bg-theme"><div class="row"><div class="col align-self-center ps-0"><p class="size-10" style="display:grid;"><b class="size-9 mr-2">'+gasto.nombreDia+' | '+
                        gasto.descripcion + '</b><b class=" size-10 text-muted">' + gasto.monto +
                        ' Bs. | ' + moment(fecha).format('H:m A') + '</b></p></div></div></a></div>');
                });
            });
        </script>
    @endpush
</div>
