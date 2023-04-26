<div>
    <div class="row mb-1 justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-auto">
                            <div class="avatar avatar-40 bg-primary text-white shadow-sm rounded-10">
                                <i class="fa fa-money-bill"></i>
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="mb-0 text-color-theme">Detalle de Prestamo: {{ $prestamo->idFolio() }}</p>
                            <p class="text-muted small">Dias de retraso:
                                {{ retrasosPrestamoUser($prestamo->user_id, $prestamo->id) }}</p>

                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">

                            <div class="row position-relative">
                                <div class="col pe-0">
                                    <div class="form-group form-floating">
                                        <input type="text" class="form-control " placeholder="Bs"
                                            value="{{ $prestamo->monto_inicial }}" readonly>
                                        <label class="form-control-label" for="amountpoints">Inicial(Bs)</label>
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <div class="form-group form-floating">
                                        <input type="text" class="form-control text-end" placeholder="Bs"
                                            value="{{ $prestamo->monto_final }}" readonly>
                                        <label class="form-control-label text-end pe-1 end-0 start-auto"
                                            for="amountcurrency">Final(Bs)</label>
                                    </div>
                                </div>
                                <button
                                    class="btn btn-44 btn-success text-white shadow-sm position-absolute start-50 top-50 translate-middle">
                                    <i class="bi bi-arrow-right"></i>
                                </button>
                            </div>
                            <div class="progress m-2">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-{{$prestamo->colorProgresoBar()}}"
                                    style="width: {{ $prestamo->porcentajeProgreso() }}%" role="progressbar"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="mt-2">
                                <small> {{ fechaFormateada(4, $prestamo->created_at->format('d-m-Y')) }}</small><small
                                    class="float-end mt-1">{{ fechaFormateada(4, $prestamo->fecha_final) }}</small>

                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="card shadow-sm mb-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-auto px-0">
                                            <div class="avatar avatar-40 bg-info text-white shadow-sm rounded-10-end">
                                                <i class="fa fa-arrow-trend-up"></i>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <p class="text-muted size-12 mb-0">Ganancia Total</p>
                                            <p>{{ $prestamo->gananciaPrestamo() }} Bs</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="card shadow-sm mb-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-auto px-0">
                                            <div class="avatar avatar-40 bg-info text-white shadow-sm rounded-10-end">
                                                <i class="fa fa-money-bill"></i>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <p class="text-muted size-12 mb-0">Pagado</p>
                                            <p>{{ $prestamo->abonos->sum('monto_abono') }} Bs</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="row mb-4 text-center py-4 bg-theme-light">
        <div class="col">
            <h6 class="mb-0">{{ $prestamo->interes }} %</h6>
            <p class="text-muted small">Interes </p>
        </div>
        <div class="col">
            <h6 class="mb-0">{{ $prestamo->cuotasRestantes() }}</h6>
            <p class="text-muted small">Cuotas Restantes</p>
        </div>
        <div class="col">
            <h6 class="mb-0">{{ $prestamo->cuota }} Bs</h6>
            <p class="text-muted small">Cuota Diaria</p>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12 ">
            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalAbono"
                class="btn btn-primary btn-lg shadow-sm w-100">
                Abonar
            </a>
        </div>
    </div>
    <div wire:ignore class="card" id='calendar'></div>
</div>
@push('footer')
    <div class="modal fade" id="modalAbono" tabindex="-1" aria-labelledby="modalCreateGastoLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3 class="text-color-theme mb-2">Abonar</h3>
                    <form>
                        <div class="col-12">
                            <div class="form-group form-floating  mb-3">
                                <input type="number" step="any" class="form-control" placeholder="Monto" name="monto"
                                    id="monto" value="{{ $prestamo->cuota }}">

                                <label for="monto">Monto (Bs)</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-floating  mb-3">

                                <input type="date" step="any" class="form-control" placeholder="Fecha"
                                    id="fecha" value="{{ date('Y-m-d') }}">

                                <label for="descripcion">Fecha</label>
                            </div>
                        </div>
                        <button type="button" id="saveAbono"
                            class="btn btn-success btn-lg w-100 btn-block text-white">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {

                initialView: 'dayGridMonth',
                contentHeight: 'auto',
                events: {!! $calendario !!},
                hiddenDays: [0],
                locale: 'es'
            });
            calendar.render();
        });
        $(document).ready(function() {
            $('#saveAbono').click(function() {
                Livewire.emit('saveAbono', $('#monto').val(), $('#fecha').val())

            });
            Livewire.on('resetModal', data => {
                $('#modalAbono').modal('hide');
            })

        });
    </script>
@endpush
