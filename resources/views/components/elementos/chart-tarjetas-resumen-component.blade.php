<div>
    
    <div class="row mb-3">
        <div class="col">
            <h6 class="title">Alcances de hoy</h6>
        </div>
        
    </div>
    <div class="row mb-4">
        <div class="col-12 col-md-4 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="avatar avatar-40 alert-success text-success rounded-circle">
                                <i class="bi bi-arrow-down-left size-20"></i>
                            </div>
                        </div>
                        <div class="col align-self-center ps-0">
                            <div class="row mb-2">
                                <div class="col">
                                    <p class="small text-muted mb-0">Cobros de hoy</p>
                                    <p>{{getAbonosToday(auth()->id())}} Bs</p>
                                </div>
                                <div class="col-auto text-end">
                                    <p class="small text-muted mb-0">Restante</p>
                                    <p class="small">{{getCobrosRestantesToday(auth()->id())}} Bs</p>
                                </div>
                            </div>

                            <div class="progress alert-success h-4">
                                <div class="progress-bar bg-success w-{{getPorcentajeCobroToday()}}"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-auto">
            <div class="avatar avatar-60 shadow-sm rounded-10 bg-info text-white">
                <i class="fa fa-wallet size-32"></i>
            </div>
        </div>
        <div class="col align-self-center ps-0">
            <p class="mb-1 text-color-theme">Billetera actual:
                <span class="tag bg-success text-white border-success py-1 px-2 float-end mt-1"> Actualizado</span>
            </p>
            <div class="row">
                <div class="col">{{auth()->user()->billetera}} Bs</div>
                <div class="col-auto align-self-center text-end">
                    <span class="text-muted size-12 "></span>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-auto">
            <div class="avatar avatar-60 shadow-sm rounded-10 bg-danger text-white">
                <i class="fa fa-calendar-week size-32"></i>
            </div>
        </div>
        <div class="col align-self-center ps-0">
            <p class="mb-1 text-color-theme">Prestamos esta semana:
                <span class=" float-end mt-1"> Total: {{$user->prestamosSemana->count()}}</span>
                
            </p>
            <div class="row">
                <div class="col">{{$user->prestamosSemana->sum('monto_inicial')}} Bs</div>
                <div class="col-auto align-self-center text-end">
                    <span class="text-muted size-12 "></span>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-auto">
            <div class="avatar avatar-60 shadow-sm rounded-10 bg-warning text-white">
                <i class="fa fa-cart-arrow-down size-32"></i>
            </div>
        </div>
        <div class="col align-self-center ps-0">
            <p class="mb-1 text-color-theme">Gastos esta semana:
                <span class=" float-end mt-1"> Total: {{$user->gastosSemana->count()}}</span>
                
            </p>
            <div class="row">
                <div class="col">{{$user->gastosSemana->sum('monto')}} Bs</div>
                <div class="col-auto align-self-center text-end">
                    <span class="text-muted size-12 "></span>
                </div>
            </div>
        </div>
    </div>
</div>
