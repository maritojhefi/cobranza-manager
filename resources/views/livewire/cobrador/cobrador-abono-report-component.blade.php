<div>
    <div>
        <div class="row">
            <p>
                Abonos de {{ isset($caja) ? 'la semana actual' : 'todas las semanas' }}
            </p>
            @if (!$caja)
                @foreach ($arrayCajas as $array)
                    @foreach ($array as $caja)
                        <div class="shadow-sm mb-4 abono-lista" type="button" id=""
                            wire:click="mostrarAbonoMany('{{ $caja->id }}')">
                            <div class="card theme-bg text-white text-center">
                                <div class="card-body">
                                    <p class="text-muted mb-0 size-12">{{ fechaFormateada(2, $caja->fecha_inicial) }} -
                                        {{ fechaFormateada(2, $caja->fecha_final) }} </p>
                                    <h4 class="display-1" style="font-size: 17px;">
                                        {{ number_format($registros[$caja->id]->sum('monto_abono'), 2, ',', ' ') }}
                                        Bs.
                                    </h4>
                                    <p class="text-muted size-12">Abonos Totales de la Semana <span
                                            class="text-muted mr-2">({{ $registros[$caja->id]->count() }}
                                            Abonos)</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            @else
                <div class="shadow-sm mb-4 abono-lista" type="button" id=""
                    wire:click="mostrarAbonoSingle('{{ $registros }}')">
                    <div class="card theme-bg text-white text-center">
                        <div class="card-body">
                            <p class="text-muted size-12">{{ fechaFormateada(2, $cajaSeleccionada->fecha_inicial) }} -
                                {{ fechaFormateada(2, $cajaSeleccionada->fecha_final) }} </p>
                            <h4 class="display-1" style="font-size: 17px;">
                                {{ number_format($registros->sum('monto_abono'), 2, ',', ' ') }} Bs.</h4>
                            <p class="text-muted size-12">Abonos Totales de la Semana <span
                                    class="text-muted mr-2">({{ $registros->count() }}
                                    Abonos)</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @push('modals')
        <div class="modal fade" id="modalVerAbonoSemanaMany" tabindex="-1" aria-labelledby="modalVerPrestamoSemanaLabel"
            style="display: none;" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header"
                        style="border-bottom:none; margin-left: 2%;margin-top: 2%;margin-bottom: -5%;">
                        <h3 class="text-color-theme mb-2 size-14">Abonos de la semana</h3>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"
                            style="border-radius: 50%;">
                            <i class="fa fa-xmark"></i>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <ul class="list-group list-group-flush bg-none lista-abono-many">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalVerAbonoSemanaSingle" tabindex="-1" aria-labelledby="modalVerPrestamoSemanaLabel"
            style="display: none;" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header"
                        style="border-bottom:none; margin-left: 2%;margin-top: 2%;margin-bottom: -5%;">
                        <h3 class="text-color-theme mb-2 size-14">Abonos de la semana</h3>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"
                            style="border-radius: 50%;">
                            <i class="fa fa-xmark"></i>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <ul class="list-group list-group-flush bg-none lista-abono-single">
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
                $('#modalVerAbonoSemanaMany').modal('show');
                $('.lista-abono-many').empty();
                var diaAnterior = null;
                data.forEach(function(abono, index) {
                    var hora = abono.created_at;
                    if (abono.nombreDia != diaAnterior) {
                        $('.lista-abono-many').append(
                            '<span class="size-15" style="margin-top: 3%; display: flex; align-items: flex-start;justify-content: flex-start;">' +
                            abono.nombreDia + '</span>');
                        diaAnterior = abono.nombreDia;
                    }
                    $('.lista-abono-many').append(
                        '<li class="list-group-item p-1 m-1"><div class="row"><div class="col d-flex align-self-center ps-0"><div class="avatar avatar-40 rounded-10" style="margin-right:3%;"><img src="{{ asset('') }}' +
                        abono.prestamo.user.foto +
                        '" alt=""></div><div class="col align-self-center ps-0"><p align="left" style="text-align: left !important;" class="text-color-theme mb-0 size-10">' +
                        abono.prestamo.user.name + ' ' + abono.prestamo.user.apellido +
                        '</p><p align="left" style="text-align: left !important;margin-bottom: 0px;margin-top: 3px;" class="text-muted size-12"> CI : ' +
                        abono.prestamo.user.ci +
                        '</p>  <p align="left" style="text-align: left !important;" class="text-muted size-12">' +
                        timeago(abono.fecha) +
                        '</p>  </div><div class="col align-self-center text-end"><p class="mb-0 size-12">' +
                        abono.monto_abono + ' Bs.</p><p class="text-muted size-12">' + moment(hora)
                        .format('H:mm A') + '</p></div></div></div></li>');
                });
            });
        </script>
        <script>
            function timeago(date) {
                const timestamp = new Date(date).getTime() / 1000;
                const strTime = ['segundo', 'minuto', 'hora', 'día', 'mes', 'año'];
                const length = [60, 60, 24, 30, 12, 10];
                const currentTime = Math.floor(Date.now() / 1000);

                if (currentTime >= timestamp) {
                    let diff = currentTime - timestamp;
                    let i = 0;
                    while (diff >= length[i] && i < length.length - 1) {
                        diff = diff / length[i];
                        i++;
                    }
                    diff = Math.round(diff);
                    return 'Hace ' + diff + ' ' + strTime[i] + '(s)';
                } else {
                    const diff = (timestamp - currentTime) / (60 * 60 * 24);
                    const futureDate = new Date(date).toLocaleDateString();
                    return 'Falta(n) ' + Math.round(diff) + ' día(s)';
                }
            }
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
                $('#modalVerAbonoSemanaSingle').modal('show');
                $('.lista-abono-single').empty();
                var diaAnterior = null;
                datos.forEach(function(abono, index) {
                    var hora = abono.created_at;
                    if (abono.nombreDia != diaAnterior) {
                        $('.lista-abono-single').append(
                            '<span class="size-15" style="margin-top: 3%; display: flex; align-items: flex-start;justify-content: flex-start;">' +
                            abono.nombreDia + '</span>');
                        diaAnterior = abono.nombreDia;
                    }
                    $('.lista-abono-single').append(
                        '<li class="list-group-item p-1 m-1"><div class="row"><div class="col d-flex align-self-center ps-0"><div class="avatar avatar-40 rounded-10" style="margin-right:3%;"><img src="{{ asset('') }}' +
                        abono.prestamo.user.foto +
                        '" alt=""></div><div class="col align-self-center ps-0"><p align="left" style="text-align: left !important;" class="text-color-theme mb-0 size-10">' +
                        abono.prestamo.user.name + ' ' + abono.prestamo.user.apellido +
                        '</p><p align="left" style="text-align: left !important;margin-bottom: 0px;margin-top: 3px;" class="text-muted size-12"> CI : ' +
                        abono.prestamo.user.ci +
                        '</p>  <p align="left" style="text-align: left !important;" class="text-muted size-12">' +
                        timeago(abono.fecha) +
                        '</p>  </div><div class="col align-self-center text-end"><p class="mb-0 size-12">' +
                        abono.monto_abono + ' Bs.</p><p class="text-muted size-12">' + moment(hora)
                        .format('H:mm A') + '</p></div></div></div></li>');
                });
            });
        </script>
    @endpush



</div>
