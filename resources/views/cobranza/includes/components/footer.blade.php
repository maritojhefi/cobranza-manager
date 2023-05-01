<footer class="footer">
    <div class="container">
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
                <a class="nav-link {{ request()->segment(2) == 'inicio' ? 'active' : '' }}" href="{{route('cobrador.inicio')}}">
                    <span>
                        <i class="nav-icon bi bi-house"></i>
                        <span class="nav-text">Inicio</span>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->segment(2) == 'reporte' ? 'active' : '' }}" href="{{route('cobrador.reporte')}}">
                    <span>
                        <i class="nav-icon bi bi-laptop"></i>
                        <span class="nav-text">Reportes</span>
                    </span>
                </a>
            </li>
            <li class="nav-item centerbutton">
                <div class="nav-link">
                    <span class="theme-radial-gradient">
                        <i class="close bi bi-x"></i>
                        <img src="{{asset('assets/img/centerbutton.svg')}}" class="nav-icon" alt="" />
                    </span>
                    <div class="nav-menu-popover justify-content-between">
                        <button type="button" class="btn btn-lg btn-icon-text"
                            onclick="window.location.replace('{{route('cobrador.prestamo')}}');">
                            <i class="bi bi-credit-card size-32"></i><span>Nuevo Prestamo</span>
                        </button>

                        <button type="button" class="btn btn-lg btn-icon-text"
                            onclick="window.location.replace('{{route('cobrador.gasto.create')}}');">
                            <i class="bi bi-arrow-up-right-circle size-32"></i><span>Gastos</span>
                        </button>

                        <button type="button" class="btn btn-lg btn-icon-text"
                            onclick="window.location.replace('{{route('cobrador.user.pendiente',[4, 'pendientes' => true])}}');">
                            <i class="bi bi-receipt size-32"></i><span>Pendientes</span>
                        </button>

                       
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->segment(2) == 'metas' ? 'active' : '' }}" href="{{route('cobrador.metas')}}">
                    <span>
                        <i class="nav-icon bi bi-gift"></i>
                        <span class="nav-text">Metas</span>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->segment(2) == 'billetera' ? 'active' : '' }}" href="{{route('cobrador.billetera')}}">
                    <span>
                        <i class="nav-icon bi bi-wallet2"></i>
                        <span class="nav-text">Billetera</span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</footer>