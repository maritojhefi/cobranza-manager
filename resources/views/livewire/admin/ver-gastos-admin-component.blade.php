<div>
    <div class="row mb-4">
        <div class="col-12">
            <input type="text" wire:model="search" class="form-control my-2" placeholder="Buscar por nombre o CI">
            @if ($cobradores->isNotEmpty())
                @foreach ($cobradores as $cobrador)
                    <div class="card mb-3 ml-2 mr-2">
                        <div class="card-body">
                            <div onclick="location.href='{{ route('admin.gasto.cobrador', ['cobrador_id' => $cobrador->id]) }}'"
                                class="">
                                <div class="row">
                                    <div class="col-auto d-flex align-items-center">
                                        <div class="avatar avatar-40 bg-secondary text-white shadow-sm rounded-10">
                                            <img src="{{ asset('') . $cobrador->foto }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col align-self-center ps-0">
                                        <small class="mb-0">{{ ucwords($cobrador->name) }}</small>
                                        <p class="text-muted size-12 mb-0">Monto Actual :</p>
                                        <small
                                            class="text-muted size-12">{{ number_format($cobrador->billetera, 2, ',', ' ') }}
                                            Bs</small>
                                    </div>
                                    <div class="col align-self-center text-end">
                                        <p class="size-12">C.I : {{ $cobrador->ci }}</p>
                                        <p class="text-muted size-12">Gastos : {{ $cobrador->gastos->count() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="card text-center" style="background-color: rgb(255 255 255 / 0%); border-color: #04134400;">
                    <div class="card-body">
                        <h4 class="text-muted ml-2 mr-2">No existe ese cobrador, que tenga gastos registrados</h4>
                    </div>
                </div>
            @endif
        </div>
        {{ $cobradores->links() }}
    </div>
</div>
