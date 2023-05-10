<div>

    <div class="row mb-3">
        <div class="col-12">
            <div class="card theme-bg text-white border-0 text-center">
                <div class="card-body">
                    <h1 class="display-1 my-2">
                        {{ $cajaSemanal->abonos->sum('monto_abono') + $cajaSemanal->monto_inicial - ($cajaSemanal->prestamos->sum('monto_inicial') + $cajaSemanal->gastos->sum('monto')) }}
                        Bs</h1>
                    <p class="text-muted mb-2">Caja final de la semana</p>
                </div>
            </div>
        </div>

    </div>

    <div class="row mb-3">
        <div class="col">
            <h6 class="title">Del: {{ fechaFormateada(2, $cajaSemanal->fecha_inicial) }}</h6>
        </div>
        <div class="col-auto">
            <h6 href="" class="title">Al: {{ fechaFormateada(2, $cajaSemanal->fecha_final) }}</h6>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <div class="card shadow-sm mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-40 bg-success text-white shadow-sm rounded-10">
                                <i class="bi bi-arrow-down-left size-22"></i>
                            </div>
                        </div>
                        <div class="col px-0">
                            <p class="text-muted size-12 mb-0">Ingreso</p>
                            <p>{{ $cajaSemanal->abonos->sum('monto_abono') + $cajaSemanal->monto_inicial }} Bs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card shadow-sm mb-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-40 bg-danger text-white shadow-sm rounded-10">
                                <i class="bi bi-arrow-up-right size-22"></i>
                            </div>
                        </div>
                        <div class="col px-0">
                            <p class="text-muted size-12 mb-0">Egreso</p>
                            <p>{{ $cajaSemanal->prestamos->sum('monto_inicial') + $cajaSemanal->gastos->sum('monto') }}
                                Bs
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <h6 class="title">Detalle:</h6>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12 px-0">
            <ul class="list-group list-group-flush bg-none">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-50 shadow rounded-10 bg-warning text-white">
                                <i class="fa fa-flag-checkered size-32"></i>
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="text-color-theme mb-0">Monto de entrada</p>
                            <p class="text-muted size-12">Al iniciar la semana</p>
                        </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-50 shadow rounded-10 bg-success text-white">
                                <i class="fa fa-money-bills size-32"></i>
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="text-color-theme mb-0">Cobrado</p>
                            <p class="text-muted size-12">Sumatoria de abonos</p>
                        </div>
                        <div class="col align-self-center text-end">
                            <p class="mb-0 fw-bold">{{ $cajaSemanal->abonos->sum('monto_abono') }} Bs</p>
                            <a href="{{route('cobrador.abonos.all', $cajaSemanal->id )}}" class="small">Ver detalles</a>
                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-50 shadow rounded-10 bg-info">
                                <i class="fa fa-money-bill-transfer size-32 text-white"></i>
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="text-color-theme mb-0">Prestado:</p>
                            <p class="text-muted size-12">Sumatoria de prestamos</p>
                        </div>
                        <div class="col align-self-center text-end">
                            <p class="mb-0 fw-bold">{{ $cajaSemanal->prestamos->sum('monto_inicial') }} Bs</p>
                            <a href="{{route('cobrador.report', $cajaSemanal->id )}}" class="small">Ver detalles</a>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-50 shadow rounded-10 bg-danger">
                                <i class="fa fa-cart-arrow-down size-32 text-white"></i>
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <p class="text-color-theme mb-0">Gastado</p>
                            <p class="text-muted size-12">Sumatoria de gastos</p>
                        </div>
                        <div class="col align-self-center text-end">
                            <p class="mb-0 fw-bold">{{ $cajaSemanal->gastos->sum('monto') }} Bs</p>
                            <a href="{{route('cobrador.gasto.report', $cajaSemanal->id)}}" class="small">Ver detalles</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <h6 class="title">Por Dias:</h6>
        </div>
    </div>
    <div class="row">
            @foreach (diasConActividad($cajaSemanal->id) as $dia)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-auto align-self-center">
                                    <div class="avatar avatar-40 bg-success text-white shadow-sm rounded-10">
                                        <span class="size-32">{{ fechaFormateada(2, $dia)[0] }}</span>
                                    </div>
                                </div>
                                <div class="col align-self-center ps-0">
                                    <p class="mb-0 text-color-theme size-10">{{ fechaFormateada(2, $dia) }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <small class="size-10">Cobrado:</small>
                                </div>
                                <div class="col-auto align-self-center text-end size-12">
                                    <small
                                        class="">{{ totalAbonadoDay($cajaSemanal->id,$dia) }}
                                        Bs</small>
                                </div>
                            </div>
                            <hr class="p-0 m-0">
                            <div class="row">
                                <div class="col-auto">
                                    <small class="size-10">Prestado:</small>
                                </div>
                                <div class="col-auto align-self-center text-end size-12">
                                   
                                    <small
                                        class="">{{ totalPrestadoDay($cajaSemanal->id,$dia) }}
                                        Bs</small>
                                </div>
                            </div>
                            <hr class="p-0 m-0">
                            <div class="row">
                                <div class="col-auto">
                                    <small class="size-10">Gastado:</small>
                                </div>
                                <div class="col-auto align-self-center text-end size-12">
                                    
                                    <small
                                        class="">{{ totalGastadoDay($cajaSemanal->id,$dia) }}
                                        Bs</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
</div>
