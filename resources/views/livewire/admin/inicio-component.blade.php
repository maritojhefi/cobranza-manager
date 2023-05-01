<div>
    <div class="row mb-3">
        <div class="col">
            <h6 class="title">Cobradores recientes:</h6>
        </div>
        <div class="col-auto">
            <a href="{{ route('cobrador.user.list', 3) }}" class="small">Ver todos</a>
        </div>
    </div>
    <div class="row mb-3">
        @foreach ($cobradores as $cobrador)
        <div class="col-4" >
            <a href="javascript:void(0);" class="card text-center">
                <div class="card-body">
                    <figure class="avatar avatar-50 shadow-sm mb-1 rounded-10">
                        <img src="{{asset($cobrador->foto)}}" alt="">
                    </figure>
                    <p class="text-color-theme size-12 small">{{$cobrador->name}}</p>
                </div>
            </a>
        </div>
        @endforeach
       

    </div>
    <div class="row mb-3">
        <div class="col">
            <h6 class="title">Resumen<br><small class="fw-normal text-muted">Hoy, {{fechaFormateada(2)}}</small>
            </h6>
        </div>
       
    </div>
    <div class="col-12 px-0">
        <ul class="list-group list-group-flush bg-none">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-auto">
                        <div class="avatar avatar-50 shadow rounded-10 ">
                            <i class="bi bi-arrow-down-left-circle size-32 text-success"></i>
                            
                        </div>
                    </div>
                    <div class="col align-self-center ps-0">
                        <p class="text-color-theme mb-0">Cobrado:</p>
                        <p class="text-muted size-12">Hoy</p>
                    </div>
                    <div class="col align-self-center text-end">
                        <p class="mb-0">{{getAbonosToday()}} Bs</p>
                        <p class="text-muted size-12">Entrante</p>
                    </div>
                </div>
            </li>

            <li class="list-group-item">
                <div class="row">
                    <div class="col-auto">
                        <div class="avatar avatar-50 shadow rounded-10">
                            <i class="bi bi-arrow-up-right-circle size-32 text-danger"></i>
                        </div>
                    </div>
                    <div class="col align-self-center ps-0">
                        <p class="text-color-theme mb-0">Prestado:</p>
                        <p class="text-muted size-12">Hoy</p>
                    </div>
                    <div class="col align-self-center text-end">
                        <p class="mb-0">{{totalPrestadoToday()}} Bs</p>
                        <p class="text-muted size-12">Saliente</p>
                    </div>
                </div>
            </li>

        
        </ul>
    </div>
</div>
