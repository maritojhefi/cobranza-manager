<div>
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-auto">
                    <figure class="avatar avatar-44 rounded-10">
                        <img src="{{ asset('/' . $user->foto) }}" alt="">
                    </figure>
                </div>
                <div class="col px-0 align-self-center">
                    <p class="mb-0 text-color-theme">{{ $user->getFullNameAttribute() }}</p>
                    <p class="text-muted size-12">({{ $user->role->nombre_rol }})</p>
                </div>
                @if ($user->role_id != 1)
                    <div class="col-auto">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalCreateGasto"
                            class="btn btn-44 btn-light shadow-sm">
                            <i class="bi bi-plus-circle"></i>
                        </a>
                    </div>
                @endif
            </div>
        </div>
        <div class="card theme-bg text-white border-0 text-center">
            <div class="card-body">
                <h1 class="display-1 my-2">{{ number_format($gastoUser->sum('monto'), 2, ',', ' ') }} Bs.</h1>
                <p class="text-muted mb-2">Gasto Total del día <span class="text-muted mr-2">({{ $gastoUser->count() }}
                        gasto's)</span>
                </p>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="row mb-2">
            <h6>
                (Hoy) {{ fechaFormateada(3) }}
            </h6>
        </div>
        <div class="col-12 px-1">
            @if ($gastoUser->isNotEmpty())
                @foreach ($gastoUser as $gasto)
                    <div class="card mb-3 ml-2 mr-2">
                        <div class="card-body">
                            @if (auth()->user()->role_id == 1)
                                <span class="text-muted">{{ $gasto->user->name }} - (C.I :
                                    {{ $gasto->user->ci }})</span>
                            @endif
                            <div class="row mt-1">
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
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="card text-center" style="background-color: rgb(255 255 255 / 0%); border-color: #04134400;">
                    <div class="card-body">
                        <h4 class="text-muted ml-2 mr-2">No existen gastos del dia hasta el momento</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@push('modals')
    <div class="modal fade" id="modalCreateGasto" tabindex="-1" aria-labelledby="modalCreateGastoLabel"
        style="display: none;" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3 class="text-color-theme mb-2">Crear Gasto</h3>
                    <div class="col-12">
                        <div class="form-group form-floating  mb-3">
                            <input type="number" step="any" class="form-control" placeholder="Monto" name="monto"
                                id="monto">
                            @error('monto')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                            <label for="monto">Monto (Bs)</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group form-floating  mb-3">
                            {{-- <input type="text" class="form-control @error('descripcion') is-invalid @enderror"
                                        placeholder="Descripcion" wire:model.debounce.750ms="descripcion"> --}}
                            <textarea class="form-control" type="text" name="descripcion" id="descripcion" cols="30" rows="3"
                                placeholder="Descripcion"></textarea>
                            @error('descripcion')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                            <label for="descripcion">Descripción</label>
                        </div>
                    </div>
                    <button id="guardar" class="btn btn-default btn-lg w-100 btn-block">Crear</button>
                </div>
            </div>
        </div>
    </div>
@endpush
@push('footer')
    <script>
        $(document).ready(function() {
            $('#guardar').click(function() {
                Livewire.emit('guardarGasto',
                    $('#monto').val(),
                    $('#descripcion').val()
                );
            });
        });
    </script>
@endpush
