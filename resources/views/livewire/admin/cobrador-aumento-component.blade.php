<div>
    <div class="col-12">
        <p>Seleccione un usuario para filtrar los registros:</p>
        <div class="form-group form-floating mb-3">
            <select name="id" class="form-control" placeholder="Usuario">
                <option value="">Seleccione usuario</option>
                @foreach ($usuarios as $user)
                    <option id="{{ $user->id }}" value="{{ $user->id }}">
                        {{ ucwords($user->getFullNameAttribute()) }}</option>
                @endforeach
            </select>
            <label for="usuarios">Usuario</label>
        </div>
        <div class="card shadow-sm mb-4">
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
                            </div>
                            <div class="col-5 p-0">
                                <p class="text-muted size-10 m-0">Monto Anterior al Aumento:
                                    {{ $aumento->monto_aumento }}Bs.</p>
                                <hr class="m-1 p-0">
                                <p class="text-muted size-10 m-0">Monto Aumento:
                                    {{ $aumento->monto_aumento }}Bs.</p>
                                <hr class="m-1 p-0">
                                <p class="text-muted size-10 m-0">Monto Actual:
                                    {{ $user->monto_total }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="row table table-responsive">
            {{ $monto_cobrador->links() }}
        </div>
    </div>
    @push('footer')
        <script>
            $('select[name="id"]').change(function() {
                var selectedOptionId = $('option:selected', this).attr('id');
                Livewire.emit('selectUser', selectedOptionId);
            });
        </script>
    @endpush
</div>
