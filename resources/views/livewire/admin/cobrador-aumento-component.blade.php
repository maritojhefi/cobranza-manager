<div>
    <div class="col-12">
        <p>Seleccione un cobrador para filtrar los registros:</p>
        <div class="form-group form-floating mb-3">
            <select class="form-control" placeholder="Usuario" wire:model="filtro"
                wire:change="actualizarFiltro($event.target.value)">
                <option value="">Seleccione usuario</option>
                @foreach ($usuarios as $user)
                    <option value="{{ $user->id }}"><small>(Id :{{ $user->id }})</small> =
                        {{ ucwords($user->getFullNameAttribute()) }}</option>
                @endforeach
            </select>
            <label for="usuarios">Usuario</label>
        </div>
        <div class="card shadow-sm mb-4">
            @if ($monto_cobrador->isNotEmpty())
                <ul class="list-group list-group-flush bg-none">
                    @foreach ($monto_cobrador as $aumento)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-2 p-1">
                                    <figure class="avatar avatar-50 "
                                        style="border: 3px solid {{ $aumento->user->color }} !important;border-radius:50%">
                                        <img src="{{ asset('/' . $aumento->user->foto) }}" alt="">
                                    </figure>
                                </div>
                                <div class="col-4 size-12" style="padding-left: 7px">
                                    <strong>{{ ucwords($aumento->user->full_name) }}
                                    </strong>
                                    <p class="text-muted size-10 m-0">{{ $aumento->created_at->format('Y-m-d g:i A') }}
                                    </p>
                                </div>
                                <div class="col-5 p-0">
                                    <p class="text-muted size-10 m-0">Monto Anterior:
                                        {{ $aumento->monto_actual }}Bs.</p>
                                    <hr class="m-1 p-0">
                                    <p class="text-muted size-10 m-0">Monto Aumento:
                                        {{ $aumento->monto_aumento }}Bs.</p>
                                    <hr class="m-1 p-0">
                                    <p class="text-muted size-10 m-0">Monto Actual:
                                        {{ $aumento->monto_total }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-center" style="display: grid; height: 100px; place-items: center;">No existen registros
                    de aumentos para este cobrador</p>
            @endif
        </div>
        @if ($monto_cobrador->isNotEmpty())
            <div class="row table table-responsive">
                {{ $monto_cobrador->links() }}
            </div>
        @endif
    </div>
</div>
