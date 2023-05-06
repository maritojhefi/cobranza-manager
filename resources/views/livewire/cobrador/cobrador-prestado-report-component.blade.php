<div>
    <div>
        <div class="row">
            <p>
                Prestamos de {{ isset($caja) ? 'la semana actual' : 'todas las semanas' }}
            </p>
            @if (!$caja)
                @foreach ($arrayCajas as $array)
                    @foreach ($array as $caja)
                        <div class="shadow-sm mb-4 prestamo-lista" type="button" id=""
                            wire:click="mostrarPrestamoMany('{{ $caja->id }}')">
                            <div class="card theme-bg text-white text-center">
                                <div class="card-body">
                                    <p class="text-muted mb-0 size-12">{{ fechaFormateada(2, $caja->fecha_inicial) }} -
                                        {{ fechaFormateada(2, $caja->fecha_final) }} </p>
                                    <h4 class="display-1" style="font-size: 17px;">
                                        {{ number_format($registros[$caja->id]->sum('monto_inicial'), 2, ',', ' ') }}
                                        Bs.
                                    </h4>
                                    <p class="text-muted size-12">Prestamos Totales de la Semana <span
                                            class="text-muted mr-2">({{ $registros[$caja->id]->count() }}
                                            prestamos)</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            @else
                <div class="shadow-sm mb-4 prestamo-lista" type="button" id=""
                    wire:click="mostrarPrestamoSingle('{{ $registros }}')">
                    <div class="card theme-bg text-white text-center">
                        <div class="card-body">
                            <p class="text-muted size-12">{{ fechaFormateada(2, $cajaSeleccionada->fecha_inicial) }} -
                                {{ fechaFormateada(2, $cajaSeleccionada->fecha_final) }} </p>
                            <h4 class="display-1" style="font-size: 17px;">
                                {{ number_format($registros->sum('monto_inicial'), 2, ',', ' ') }} Bs.</h4>
                            <p class="text-muted size-12">Prestamos Totales de la Semana <span
                                    class="text-muted mr-2">({{ $registros->count() }}
                                    prestamos)</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @push('modals')
        <div class="modal fade" id="modalVerPrestamoSemana" tabindex="-1" aria-labelledby="modalVerPrestamoSemanaLabel"
            style="display: none;" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h3 class="text-color-theme mb-2 size-14">Prestamos de la semana</h3>
                        <ul class="list-group list-group-flush bg-none lista-prestamo">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endpush


    @push('footer')

        @if (!$caja)
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
            <script>
                function ucfirst(string) {
                    return string.charAt(0).toUpperCase() + string.slice(1);
                }
                Livewire.on('mostrarSemana', data => {
                    $('#modalVerPrestamoSemana').modal('show');
                    $('.lista-prestamo').empty();
                    var diaAnterior = null;
                    data.forEach(function(prestamo, index) {
                        var fecha = prestamo.created_at;
                        if (prestamo.nombreDia != diaAnterior) {
                            $('.lista-prestamo').append(
                                '<span class="size-15" style="margin-top: 3%; display: flex; align-items: flex-start;justify-content: flex-start;">' +
                                prestamo.nombreDia + '</span>');
                            diaAnterior = prestamo.nombreDia;
                        }
                        $('.lista-prestamo').append(
                            '<li class="list-group-item p-1 m-1"><div class="row"><div class="col d-flex align-self-center ps-0"><div class="avatar avatar-40 rounded-10" style="margin-right:3%;"><img src="{{ asset('') }}' +
                            prestamo.user.foto +
                            '" alt=""></div><div class="col align-self-center ps-0"><p align="left" style="text-align: left !important;" class="text-color-theme mb-0 size-10">' +
                            prestamo.user.name + ' ' + prestamo.user.apellido +
                            '</p><p align="left" style="text-align: left !important;margin-bottom: 0px;margin-top: 3px;" class="text-muted size-12"> CI : ' +
                            prestamo.user.ci +
                            '</p>  <p align="left" style="text-align: left !important;" class="text-muted size-12"> Couta : ' +
                            prestamo.cuota +
                            ' Bs.</p>  </div><div class="col align-self-center text-end"><p class="mb-0 size-12">' +
                            prestamo.monto_inicial + ' Bs.</p><p class="text-muted size-12">' + moment(fecha)
                            .format('H:mm A') + '</p></div></div></div></li>');
                    });
                });
            </script>
        @else
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
            <script>
                function ucfirst(string) {
                    return string.charAt(0).toUpperCase() + string.slice(1);
                }
                Livewire.on('mostrarSemana', datas => {
                    datas.sort(function(a, b) {
                        return moment(b.created_at).unix() - moment(a.created_at).unix();
                    });
                    $('#modalVerPrestamoSemana').modal('show');
                    $('.lista-prestamo').empty();
                    var diaAnterior = null;
                    datas.forEach(function(prestamo, index) {
                        var fecha = prestamo.created_at;
                        if (prestamo.nombreDia != diaAnterior) {
                            $('.lista-prestamo').append(
                                '<span class="size-15" style="margin-top: 3%; display: flex; align-items: flex-start;justify-content: flex-start;">' +
                                prestamo.nombreDia + '</span>');
                            diaAnterior = prestamo.nombreDia;
                        }
                        $('.lista-prestamo').append(
                            '<li class="list-group-item p-1 m-1"><div class="row"><div class="col d-flex align-self-center ps-0"><div class="avatar avatar-40 rounded-10" style="margin-right:3%;"><img src="{{ asset('') }}' +
                            prestamo.user.foto +
                            '" alt=""></div><div class="col align-self-center ps-0"><p align="left" style="text-align: left !important;" class="text-color-theme mb-0 size-10">' +
                            prestamo.user.name + ' ' + prestamo.user.apellido +
                            '</p><p align="left" style="text-align: left !important;margin-bottom: 0px;margin-top: 3px;" class="text-muted size-12"> CI : ' +
                            prestamo.user.ci +
                            '</p>  <p align="left" style="text-align: left !important;" class="text-muted size-12"> Couta : ' +
                            prestamo.cuota +
                            ' Bs.</p>  </div><div class="col align-self-center text-end"><p class="mb-0 size-12">' +
                            prestamo.monto_inicial + ' Bs.</p><p class="text-muted size-12">' + moment(fecha)
                            .format('H:mm A') + '</p></div></div></div></li>');
                    });
                });
            </script>
        @endif
    @endpush



</div>
