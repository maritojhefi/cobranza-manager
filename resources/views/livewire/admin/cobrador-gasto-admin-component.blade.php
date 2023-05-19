<div>
    <div class="row mb-4">
        <div class="col-12">
            @if ($gastos->isNotEmpty())
                @php
                    $gastosPorDia = $gastos->groupBy(function ($gasto) {
                        return $gasto->created_at->format('Y-m-d');
                    });
                @endphp
                @foreach ($gastosPorDia as $fecha => $gastosDelDia)
                    <small>{{ fechaFormateada(4, $fecha) }}</small>
                    @foreach ($gastosDelDia as $gasto)
                        <div class="card mb-3 ml-2 mr-2">
                            <div class="card-body">
                                <small class="text-muted">{{ $gasto->user->name }}</small>
                                <div class="row">
                                    <div class="col-auto d-flex align-items-center">
                                        <div class="avatar avatar-40 bg-secondary text-white shadow-sm rounded-10">
                                            <i class="bi bi-cash-stack" style="font-size: 30px;"></i>
                                        </div>
                                    </div>
                                    <div class="col align-self-center ps-0">
                                        <small class="mb-0">{{ ucfirst($gasto->descripcion) }}</small>
                                        <p class="text-muted size-12">{{ $gasto->created_at->format('H:i a') }}</p>
                                    </div>
                                    <div class="col align-self-center text-end">
                                        <p class="mb-0">{{ $gasto->monto }} Bs</p>
                                        <p class="text-muted size-12">
                                            {{ timeago($gasto->created_at) }}</p>
                                    </div>
                                    @if (prestamoCurrentCajaSemanal($gasto->fecha) == true)
                                        <div class="col-2 d-flex align-items-center justify-content-center"><button
                                                type="button" class="btn btn-danger show_confirm" id="{{$gasto->id}}"><i
                                                    class="fa fa-trash text-white"></i></button></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            @else
                <div class="card text-center" style="background-color: rgb(255 255 255 / 0%); border-color: #04134400;">
                    <div class="card-body">
                        <h4 class="text-muted ml-2 mr-2">No existen gastos del día hasta el momento</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@push('footer')
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var id = $(this).attr('id');
            event.preventDefault();
            Swal.fire({
                title: 'Estas seguro?',
                text: "Esta a punto de borrar el gasto de este cobrador. Esta acción no se puede revertir!",
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
        });
    </script>
@endpush
