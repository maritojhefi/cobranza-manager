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
        <div class="modal fade" id="modalVerPrestamoSemanaMany" tabindex="-1" aria-labelledby="modalVerPrestamoSemanaLabel"
            style="display: none;" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="border-bottom:none; margin-left: 2%;margin-top: 2%;margin-bottom: -5%;">
                        <h3 class="text-color-theme mb-2 size-14">Prestamos de la semana</h3>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close" style="border-radius: 50%;">
                            <i class="fa fa-xmark"></i>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <ul class="list-group list-group-flush bg-none lista-prestamo-many">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalVerPrestamoSemanaSingle" tabindex="-1" aria-labelledby="modalVerPrestamoSemanaLabel"
            style="display: none;" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="border-bottom:none; margin-left: 2%;margin-top: 2%;margin-bottom: -5%;">
                        <h3 class="text-color-theme mb-2 size-14">Prestamos de la semana</h3>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close" style="border-radius: 50%;">
                            <i class="fa fa-xmark"></i>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <ul class="list-group list-group-flush bg-none lista-prestamo-single">
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
            Livewire.on('mostrarSemanaMany', data => {
                $('#modalVerPrestamoSemanaMany').modal('show');
                $('.lista-prestamo-many').empty();
                var diaAnterior = null;
                data.forEach(function(prestamo, index) {
                    var fecha = prestamo.created_at;
                    if (prestamo.nombreDia != diaAnterior) {
                        $('.lista-prestamo-many').append('<span class="size-15" style="margin-top: 3%; display: flex; align-items: flex-start;justify-content: flex-start;">' +prestamo.nombreDia + '</span>'); diaAnterior = prestamo.nombreDia;
                    }
                    $('.lista-prestamo-many').append('<li class="list-group-item p-1 m-1"><div class="row"><div class="col d-flex align-self-center ps-0"><div class="avatar avatar-40 rounded-10" style="margin-right:3%;"><img src="{{ asset('') }}' +prestamo.user.foto +'" alt=""></div><div class="col align-self-center ps-0"><p align="left" style="text-align: left !important;" class="text-color-theme mb-0 size-10">' +prestamo.user.name + ' ' + prestamo.user.apellido +'</p><p align="left" style="text-align: left !important;margin-bottom: 0px;margin-top: 3px;" class="text-muted size-12"> CI : ' +prestamo.user.ci +'</p>  <p align="left" style="text-align: left !important;" class="text-muted size-12"> Couta : ' +prestamo.cuota +' Bs.</p>  </div><div class="col align-self-center text-end"><p class="mb-0 size-12">' +prestamo.monto_inicial + ' Bs.</p><p class="text-muted size-12">' + moment(fecha).format('H:mm A') + '</p></div></div></div></li>');
                });
            });
        </script>
        <script>
            function ucfirst(string) {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
            Livewire.on('mostrarSemanaSingle', datas => {
                var datos = Object.values(datas);
                datos.sort(function(a, b) {
                    return moment(b.created_at).unix() - moment(a.created_at).unix();
                });
                $('#modalVerPrestamoSemanaSingle').modal('show');
                $('.lista-prestamo-single').empty();
                var diaAnterior = null;
                datos.forEach(function(prestamo, index) {
                    var fecha = prestamo.created_at;
                    if (prestamo.nombreDia != diaAnterior) {
                        $('.lista-prestamo-single').append('<span class="size-15" style="margin-top: 3%; display: flex; align-items: flex-start;justify-content: flex-start;">' +prestamo.nombreDia + '</span>'); diaAnterior = prestamo.nombreDia;
                    }
                    $('.lista-prestamo-single').append('<li class="list-group-item p-1 m-1"><div class="row"><div class="col d-flex align-self-center ps-0"><div class="avatar avatar-40 rounded-10" style="margin-right:3%;"><img src="{{ asset('') }}' +prestamo.user.foto +'" alt=""></div><div class="col align-self-center ps-0"><p align="left" style="text-align: left !important;" class="text-color-theme mb-0 size-10">' +prestamo.user.name + ' ' + prestamo.user.apellido +'</p><p align="left" style="text-align: left !important;margin-bottom: 0px;margin-top: 3px;" class="text-muted size-12"> CI : ' +prestamo.user.ci +'</p>  <p align="left" style="text-align: left !important;" class="text-muted size-12"> Couta : ' +prestamo.cuota +' Bs.</p>  </div><div class="col align-self-center text-end"><p class="mb-0 size-12">' +prestamo.monto_inicial + ' Bs.</p><p class="text-muted size-12">' + moment(fecha).format('H:mm A') + '</p></div></div></div></li>');
                });
            });
        </script>
    @endpush



</div>
