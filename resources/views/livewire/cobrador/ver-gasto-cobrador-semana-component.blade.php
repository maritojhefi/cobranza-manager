<div>
    <div>
        <div class="row">
            <p>
                Gastos de {{ isset($caja) ? 'la semana actual' : 'todas las semanas' }}
            </p>
            @foreach ($arrayCajas as $array)
                @foreach ($array as $caja)
                    <div class="shadow-sm mb-4 gasto-lista" type="button" id=""
                        wire:click="mostrarGasto('{{ $caja->id }}')">
                        <div class="card theme-bg text-white text-center">
                            <div class="card-body">
                                <p class="text-muted mb-0 size-12">{{ fechaFormateada(2, $caja->fecha_inicial) }} -
                                    {{ fechaFormateada(2, $caja->fecha_final) }} </p>
                                <h4 class="display-1" style="font-size: 17px;">
                                    {{ number_format($registros[$caja->id]->sum('monto'), 2, ',', ' ') }} Bs.
                                </h4>
                                <p class="text-muted size-12">Gasto Total de la Semana <span
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
    @push('modals')
        <div class="modal fade" id="modalVerGastoSemana" tabindex="-1" aria-labelledby="modalCreateGastoLabel"
            style="display: none;" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h3 class="text-color-theme mb-2 size-14">Gastos de la semana</h3>
                        <ul class="list-group list-group-flush bg-none lista-gasto">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endpush
    @push('footer')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script>
            function ucfirst(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
            Livewire.on('mostrarSemana', data => {
                $('#modalVerGastoSemana').modal('show');
                $('.lista-gasto').empty();
                var diaAnterior = null;
                data.forEach(function(gasto, index) {
                    var fecha = gasto.created_at;
                    if (gasto.nombreDia != diaAnterior) {
                        $('.lista-gasto').append(
                            '<span class="size-15" style="margin-top: 3%; display: flex; align-items: flex-start;justify-content: flex-start;">' +
                            gasto.nombreDia + '</span>');
                        diaAnterior = gasto.nombreDia;
                    }
                    $('.lista-gasto').append(
                        '<li class="list-group-item p-1 m-1"><div class="row" style="padding-left: 5%;"><div class="col d-flex align-self-center ps-0"><p align="left" style="text-align: left !important;" class="text-color-theme mb-0 size-10">' +
                        ucfirst(gasto.descripcion) +
                        '</p></div><div class="col align-self-center text-end"><p class="mb-0 size-12">' +
                        gasto.monto + ' Bs.</p><p class="text-muted size-12">' + moment(fecha).format(
                            'H:mm A') + '</p></div></div></li>');
                });
            });
        </script>
        <script type="text/javascript">
            function eliminarGasto(id) {
                event.preventDefault();
                Swal.fire({
                    title: 'Estas seguro?',
                    text: "Esta acción no se puede revertir!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('eliminarGasto', id);
                    }
                })
            };
            Livewire.on('closeModal', data => {
                if (data == true) {
                    $('#modalVerGastoSemana').modal('hide');
                    $('.lista-gasto').empty();
                }
            });
        </script>
    @endpush
</div>
