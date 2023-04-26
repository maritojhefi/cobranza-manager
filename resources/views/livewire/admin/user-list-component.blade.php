<div>
    <div class="row">
        <div class="col-10">
            <h4 class="mt-2 mb-2">
                Lista de {{ $role_id->nombre_rol }} ({{$users->total()}})
            </h4>
        </div>
        <div class="col-2 d-flex align-items-end justify-content-end">
            <button type="button" wire:click="mapsUserAll" class="btn btn-sm btn-outline-primary mt-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" zoomAndPan="magnify" viewBox="0 0 30 30.000001" height="40" preserveAspectRatio="xMidYMid meet" version="1.0"><defs><clipPath id="id1"><path d="M 10 7 L 21.046875 7 L 21.046875 25.875 L 10 25.875 Z M 10 7 " clip-rule="nonzero"/></clipPath><clipPath id="id2"><path d="M 7 3.375 L 16 3.375 L 16 10 L 7 10 Z M 7 3.375 " clip-rule="nonzero"/></clipPath><clipPath id="id3"><path d="M 5.804688 6 L 12 6 L 12 15 L 5.804688 15 Z M 5.804688 6 " clip-rule="nonzero"/></clipPath><clipPath id="id4"><path d="M 11 3.375 L 21 3.375 L 21 14 L 11 14 Z M 11 3.375 " clip-rule="nonzero"/></clipPath></defs><g clip-path="url(#id1)"><path fill="rgb(28.239441%, 70.979309%, 39.219666%)" d="M 19.820312 15.644531 L 19.828125 15.644531 C 19.828125 15.644531 17.777344 18.679688 16.050781 20.933594 C 14.5625 22.882812 14.125 24.550781 14 25.359375 C 13.953125 25.652344 13.714844 25.875 13.425781 25.875 C 13.136719 25.875 12.898438 25.652344 12.847656 25.359375 C 12.722656 24.550781 12.289062 22.882812 10.796875 20.933594 C 10.570312 20.632812 10.335938 20.320312 10.101562 20 L 15.730469 13.25 L 20.261719 7.828125 C 20.761719 8.886719 21.039062 10.074219 21.039062 11.332031 C 21.039062 12.921875 20.589844 14.398438 19.820312 15.644531 Z M 19.820312 15.644531 " fill-opacity="1" fill-rule="nonzero"/></g><path fill="rgb(98.81897%, 77.648926%, 5.488586%)" d="M 15.730469 13.25 L 10.101562 20 C 8.566406 17.925781 7.023438 15.644531 7.023438 15.644531 L 7.027344 15.644531 C 6.863281 15.378906 6.71875 15.113281 6.59375 14.832031 L 11.117188 9.410156 C 10.6875 9.929688 10.433594 10.601562 10.433594 11.332031 C 10.433594 13 11.769531 14.347656 13.425781 14.347656 C 14.355469 14.347656 15.1875 13.921875 15.730469 13.25 Z M 15.730469 13.25 " fill-opacity="1" fill-rule="nonzero"/><g clip-path="url(#id2)"><path fill="rgb(17.248535%, 52.159119%, 92.158508%)" d="M 15.816406 3.78125 L 11.15625 9.367188 L 7.589844 6.226562 C 8.980469 4.480469 11.082031 3.375 13.425781 3.375 C 14.261719 3.375 15.066406 3.515625 15.816406 3.78125 Z M 15.816406 3.78125 " fill-opacity="1" fill-rule="nonzero"/></g><g clip-path="url(#id3)"><path fill="rgb(92.939758%, 34.118652%, 28.239441%)" d="M 11.15625 9.367188 L 11.117188 9.410156 L 6.59375 14.832031 C 6.09375 13.773438 5.808594 12.585938 5.808594 11.332031 C 5.808594 9.386719 6.480469 7.605469 7.589844 6.226562 Z M 11.15625 9.367188 " fill-opacity="1" fill-rule="nonzero"/></g><g clip-path="url(#id4)"><path fill="rgb(33.729553%, 58.428955%, 96.469116%)" d="M 15.730469 13.25 C 16.160156 12.730469 16.417969 12.058594 16.417969 11.332031 C 16.417969 9.664062 15.078125 8.3125 13.425781 8.3125 C 12.496094 8.3125 11.664062 8.742188 11.117188 9.410156 L 15.816406 3.78125 C 17.769531 4.449219 19.371094 5.925781 20.261719 7.828125 Z M 15.730469 13.25 " fill-opacity="1" fill-rule="nonzero"/></g></svg></i>
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
                                <div class="col-3">
                                    <figure class="avatar avatar-50 rounded-10" style="border: 3px solid {{$user->color}} !important;">
                                        <img src="{{ asset('/' . $user->foto) }}" alt="">
                                    </figure>
                                </div>
                                <div class="col-4 px-0">
                                    <small>{{ ucwords($user->name . ' ' . $user->apellido) }}<br><small
                                            class="text-muted">{{ ucfirst($user->estado->nombre_estado).' ('.($user->role->nombre_rol).')' }}</small>
                                    </small>
                                </div>
                                <div class="col-3">
                                    <small>C.I.:{{ $user->ci }}<br><small
                                            class="text-muted">Telefono:{{ $user->telf }}</small>
                                    </small>
                                </div>
                                <div class=" col-2 dropdown dropstart text-end">
                                    <a type="button" href="javascript:void(0);"
                                        class="btn btn-primary btn-sm text-white rounded-circle shadow-sm dropdown-toggle-split"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-gear"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">
                                                <strong>
                                                    <small
                                                        class="text-center">{{ ucwords($user->name . ' ' . $user->apellido) }}</small>
                                                </strong>
                                            </a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{route('cobrador.abono',['user_id'=>$user->id])}}">Ver Cuentas</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">No Pago!</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Ver en Mapa</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ url('admin/user/create/' . $user->role->id . '?editando=true&user_id=' . $user->id) }}">Editar
                                                Datos</a>
                                        </li>
                                        <li><a class="dropdown-item" href="javascript:void(0);">Contactar</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>
            <div class="row table table-responsive">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
