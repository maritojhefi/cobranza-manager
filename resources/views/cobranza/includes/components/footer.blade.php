<footer class="footer">
    <div class="container">
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
                <a class="nav-link" href="{{route('debounce')}}">
                    <span>
                        <i class="nav-icon bi bi-house"></i>
                        <span class="nav-text">Inicio</span>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('debounce')}}">
                    <span>
                        <i class="nav-icon bi bi-laptop"></i>
                        <span class="nav-text">Estadisticas</span>
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
                            onclick="window.location.replace('pay.html');">
                            <i class="bi bi-credit-card size-32"></i><span>Nuevo Credito</span>
                        </button>

                        <button type="button" class="btn btn-lg btn-icon-text"
                            onclick="window.location.replace('sendmoney.html');">
                            <i class="bi bi-arrow-up-right-circle size-32"></i><span>Gastos</span>
                        </button>

                        <button type="button" class="btn btn-lg btn-icon-text"
                            onclick="window.location.replace('bills.html');">
                            <i class="bi bi-receipt size-32"></i><span>Pendientes</span>
                        </button>

                        <button type="button" class="btn btn-lg btn-icon-text"
                            onclick="window.location.replace('receivemoney.html');">
                            <i class="bi bi-arrow-down-left-circle size-32"></i><span>Abonar</span>
                        </button>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{route('debounce')}}">
                    <span>
                        <i class="nav-icon bi bi-gift"></i>
                        <span class="nav-text">Metas</span>
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('debounce')}}">
                    <span>
                        <i class="nav-icon bi bi-wallet2"></i>
                        <span class="nav-text">Billetera</span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</footer>