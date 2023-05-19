<div class="sidebar-wrap  sidebar-pushcontent">
    <!-- Add overlay or fullmenu instead overlay -->
    <div class="closemenu text-muted">Close Menu</div>
    <div class="sidebar dark-bg">
        <!-- user information -->
        <div class="row my-3">
            <div class="col-12 ">
                <div class="card shadow-sm bg-opac text-white border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <figure class="avatar avatar-44 rounded-15">
                                    <img src="{{ asset('') . auth()->user()->foto }}" alt="">
                                </figure>
                            </div>
                            <div class="col px-0 align-self-center">
                                <p class="mb-1">{{ infoUser('name') }}</p>
                            </div>

                            <div class="col-auto">
                                <form method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-44 btn-light">
                                        <i class="bi bi-box-arrow-right"></i>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                    @if (auth()->user()->role_id == 3)
                        <x-resumen-sidebar />
                    @endif

                </div>
            </div>
        </div>

        <!-- user menu navigation -->
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills">
                    <x-elementos.items-sidebar titulo="Inicio" segmentoLink="inicio" ruta="cobrador.inicio"
                        :lista="[]">
                        <i class="bi bi-list"></i>
                    </x-elementos.items-sidebar>
                    @if (auth()->user()->role_id == 1)
                        <x-elementos.items-sidebar titulo="Cobradores" segmentoLink="cobrador" ruta="debounce"
                            :lista="[
                                'Lista de Cobradores' => ['admin.cobrador.list', 'fa fa-list-ol', 3],
                                'Crear Nuevo' => ['admin.cobrador.create', 'bi bi-person-plus', 3],
                                'Historial' => ['admin.cobrador.historial', 'fa fa-list-check'],
                            ]">
                            <i class="bi bi-person-circle"></i>
                        </x-elementos.items-sidebar>
                    @endif
                    <x-elementos.items-sidebar titulo="Clientes" segmentoLink="user" ruta="debounce" :lista="[
                        'Clientes Pendientes' => [
                            'admin.user.pendiente',
                            'bi bi-clock-history',
                            [4, 'pendientes' => true],
                        ],
                        'Todos los Clientes' => ['admin.user.list', 'bi bi-list-task', 4],
                        'Crear Cliente' => ['admin.user.create', 'bi bi-person-plus', 4],
                    ]">
                        <i class="bi bi-person-circle"></i>
                    </x-elementos.items-sidebar>
                    @if (auth()->user()->role_id == 3)
                        <x-elementos.items-sidebar titulo="Prestamos" segmentoLink="prestamos" ruta="debounce"
                            :lista="[
                                'Nuevo prestamo' => ['cobrador.prestamo', 'bi bi-coin'],
                                'Historial' => ['cobrador.report', 'bi bi-card-checklist'],
                                'Tus Abonos' => ['cobrador.abonos.all', 'fa fa-money-bill-trend-up'],
                            ]">
                            <i class="bi bi-cash-coin"></i>
                        </x-elementos.items-sidebar>
                        <x-elementos.items-sidebar titulo="Gastos" segmentoLink="gasto" ruta="debounce"
                            :lista="[
                                'Nuevo' => ['cobrador.gasto.create', 'bi bi-plus'],
                                'Historial' => ['cobrador.gasto.todo', 'bi bi-cash-stack'],
                            ]">
                            <i class="fa fa-cart-arrow-down"></i>
                        </x-elementos.items-sidebar>
                        <x-elementos.items-sidebar titulo="Reportes" segmentoLink="reporte" ruta="debounce"
                            :lista="[
                                'Reporte de hoy' => [
                                    'cobrador.reporte',
                                    'fa fa-calendar',
                                    getCurrentCaja(auth()->id())->id,
                                ],
                                'Historial' => ['cobrador.lista.reporte', 'fa fa-list-check'],
                            ]">
                            <i class="fa fa-chart-simple"></i>
                        </x-elementos.items-sidebar>
                    @endif

                    @if (auth()->user()->role_id == 1)
                        <x-elementos.items-sidebar titulo="Gastos" segmentoLink="gasto" ruta="debounce"
                            :lista="[
                                'Gasto Total del día' => ['cobrador.gasto.create', 'bi bi-plus'],
                                'Historial' => ['admin.gasto.historial', 'bi bi-cash-stack'],
                            ]">
                            <i class="fa fa-cart-arrow-down"></i>
                        </x-elementos.items-sidebar>
                    @endif

                    <x-elementos.items-sidebar titulo="Personalizacion" segmentoLink="personalizacion"
                        ruta="extra.personalizacion" :lista="[]">
                        <i class="fa fa-palette"></i>
                    </x-elementos.items-sidebar>

                    <x-elementos.items-sidebar titulo="Cambiar Contraseña" segmentoLink="cobrador" ruta="cobrador.reset"
                        :lista="[]">
                        <i class="fa fa-key"></i>
                    </x-elementos.items-sidebar>
                </ul>

            </div>
        </div>
    </div>
</div>
