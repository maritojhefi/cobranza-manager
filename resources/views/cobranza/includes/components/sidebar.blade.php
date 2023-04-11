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
                                    @auth
                                        <img src="{{ asset('assets/img/user.png') }}" alt="">
                                    @endauth
                                    @guest
                                        <img src="{{ asset('assets/img/user.png') }}" alt="">
                                    @endguest

                                </figure>
                            </div>
                            @auth
                                <div class="col px-0 align-self-center">
                                    <p class="mb-1">{{ auth()->user()->name }}</p>
                                    <p class="text-muted size-12">{{ auth()->user()->telf }}</p>
                                </div>
                            @endauth
                            @guest
                                <div class="col px-0 align-self-center">
                                    <p class="mb-1">No identificado</p>

                                </div>
                            @endguest
                            <div class="col-auto">
                                <button class="btn btn-44 btn-light">
                                    <i class="bi bi-box-arrow-right"></i>
                                </button>
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

                    <x-elementos.items-sidebar titulo="Resumen" segmentoLink="debounce" ruta="debounce"
                        :lista="[
                            'Resumen' => ['debounce', 'bi bi-badge-8k-fill'],
                            'Resumenasd' => ['debounce', 'bi bi-badge-8k-fill'],
                        ]">
                        <i class="bi bi-person"></i>
                    </x-elementos.items-sidebar>

                    <x-elementos.items-sidebar titulo="Cliente" segmentoLink="user" ruta="debounce" :lista="[
                        'Clientes Pendientes' => ['admin.user.pendiente', 'bi bi-clock-history'],
                        'Todos los Clientes' => ['admin.user.list', 'bi bi-list-task'],
                        'Crear Cliente' => ['admin.user.create', 'bi bi-person-plus'],
                    ]">
                        <i class="bi bi-person-circle"></i>
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
