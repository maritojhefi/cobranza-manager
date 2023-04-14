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
                                    <img src="{{ imageUser() }}" alt="">
                                </figure>
                            </div>
                            <div class="col px-0 align-self-center">
                                <p class="mb-1">{{infoUser('name')}}</p>
                            </div>

                            <div class="col-auto">
                                <form method="post" action="{{route('logout')}}">
                                    @csrf
                                    <button type="submit" class="btn btn-44 btn-light">
                                        <i class="bi bi-box-arrow-right"></i>
                                    </button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    <x-resumen-sidebar />
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

                    <x-elementos.items-sidebar titulo="Clientes" segmentoLink="user" ruta="debounce" :lista="[
                        'Clientes Pendientes' => ['admin.user.pendiente', 'bi bi-clock-history'],
                        'Todos los Clientes' => ['admin.user.list', 'bi bi-list-task', 4],
                        'Crear Cliente' => ['admin.user.create', 'bi bi-person-plus', 4],
                    ]">
                        <i class="bi bi-person-circle"></i>
                    </x-elementos.items-sidebar>



                    <x-elementos.items-sidebar titulo="Cobradores" segmentoLink="cobrador" ruta="debounce"
                        :lista="[
                            'Lista de Cobradores' => ['admin.cobrador.list', 'bi bi-list-task', 3],
                            'Crear Nuevo' => ['admin.cobrador.create', 'bi bi-person-plus', 3],
                        ]">
                        <i class="bi bi-person-circle"></i>
                    </x-elementos.items-sidebar>



                    <x-elementos.items-sidebar titulo="Prestamos" segmentoLink="prestamos" ruta="debounce"
                        :lista="[
                            'Nuevo prestamo' => ['cobrador.prestamo', 'bi bi-coin'],
                            'Estadisticas' => ['cobrador.prestamo', 'bi bi-card-checklist'],
                        ]">
                        <i class="bi bi-cash-coin"></i>
                    </x-elementos.items-sidebar>

                    <x-elementos.items-sidebar titulo="Personalizacion" segmentoLink="personalizacion"
                        ruta="extra.personalizacion" :lista="[]">
                        <i class="bi bi-person"></i>
                    </x-elementos.items-sidebar>
                </ul>

            </div>
        </div>
    </div>
</div>
