<div>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-auto">
                    <div class="avatar avatar-44 shadow-sm rounded-10">
                        <img src="{{ asset($user->foto) }}" alt="">
                    </div>
                </div>
                <div class="col align-self-center ps-0">
                    <p class="mb-0 text-color-theme">{{ $user->full_name }}</p>
                    <p class="text-muted small">CI: {{ $user->ci }}</p>
                </div>
                <div class="col-auto">
                    <a href="{{ route('cobrador.prestamo', ['user_id' => $user->id]) }}"
                        class="btn btn-default btn-44 shadow-sm">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <h6 class="title">Prestamos totales: {{ $user->prestamos->count() }}</h6>
                </div>
            </div>
            @foreach (auth()->user()->id != 1 ? $user->prestamos->sortBy('numeroHoy') : $user->prestamos->sortBy('created_at', 'desc') as $prestamo)
                <a href="{{ route('cobrador.abono.add', $prestamo->id) }}">
                    <div class="card mb-2 mt-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="avatar avatar-60 shadow-sm rounded-10 bg-secondary">
                                        <strong
                                            class="text-white size-20">{{ $prestamo->getTarjetasFinalizadas() }}</strong>
                                    </div>
                                </div>
                                <div class="col align-self-center p-0">
                                    <p class="text-color-theme size-12">ID: {{ $prestamo->idFolio() }}</p>
                                    <div class="row p-0">
                                        <strong class="col">{{ $prestamo->monto_final }} Bs</strong><br>
                                       
                                        <small class="size-10">Creado :
                                            {{ fechaFormateada(4, $prestamo->created_at) }}</small>
                                    </div>
                                </div>
                                <div class="col-auto p-1 mx-2">
                                    <p class="text-muted size-12 m-0">Retrasos:
                                        {{ retrasosPrestamoUser($user->id, $prestamo->id) }} dias</p>
                                    <hr class="m-1 p-0 text-success">
                                    <p class="text-muted size-12 m-0">Cuota diaria
                                        : {{ $prestamo->cuota }} Bs</p>
                                    <hr class="m-1 p-0 text-success">
                                    <p class="text-muted size-12 m-0">Cuotas
                                        : {{ $prestamo->getTarjetasFinalizadas() . '/' . $prestamo->dias }}</p>
                                    {{-- <p class="size-10 tag bg-{{ $prestamo->colorHoy }} text-white border-{{ $prestamo->colorHoy }} py-1 px-1 float-end mt-3"
                                        style="margin-right: 20%;">
                                        {{ $prestamo->estadoHoy }}</p> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row mx-0">
                            <div class="col-12">
                                <div class="progress bg-none h-5 ">
                                    <div class="progress-bar bg-{{ $prestamo->colorProgresoBar() }} "
                                        style="width: {{ $prestamo->porcentajeProgreso() }}%" role="progressbar"
                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
