<div>
    <div class="row">
        <div class="col-12">
            <h4 class="mt-2 mb-2">
                Lista de {{ $role_id->nombre_rol }}
                {{-- <div class="spinner-border d-none" wire:loading wire:target="buscar">Loading...</div> --}}
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control " id="search" wire:model.debounce.750ms="buscar"
                    wire:keydown.enter="buscarUsuarios()">
                <label class="form-control-label" for="search">Busque un usuario/CI/Telefono/Celular</label>
                <button type="button" class="text-color-theme tooltip-btn">
                    <i class="bi bi-search"></i>
                </button>
            </div>
            <div class="card shadow-sm mb-4">
                <ul class="list-group list-group-flush bg-none">
                    @foreach ($users as $user)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-auto">
                                    <figure class="avatar avatar-50 rounded-10 shadow-sm">
                                        <img src="{{ asset('/' . $user->foto) }}" alt="">
                                    </figure>
                                </div>
                                <div class="col px-0">
                                    <small>{{ ucwords($user->name . ' ' . $user->apellido) }}<br><small
                                            class="text-muted">{{ ucfirst($user->estado->nombre_estado) }}</small>
                                    </small>
                                </div>
                                <div class="col-auto">
                                    <small>C.I.:{{ $user->ci }}<br><small
                                            class="text-muted">Telefono:{{ $user->telf }}</small>
                                    </small>
                                </div>
                                <div class="dropdown dropstart col-auto text-end">
                                    <a type="button" href="javascript:return false"
                                        class="btn btn-primary text-white btn-44 rounded-circle shadow-sm dropdown-toggle-split"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-gear"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a class="dropdown-item" href="javascript:return false">
                                                <strong>
                                                    <small
                                                        class="text-center">{{ ucwords($user->name . ' ' . $user->apellido) }}</small>
                                                </strong>
                                            </a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:return false">Ver Cuentas</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:return false">No Pago!</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:return false">Ver en Mapa</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ url('admin/user/create/'.$user->role->id.'?editando=true&user_id='.$user->id)}}">Editar Datos</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:return false">Contactar</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
