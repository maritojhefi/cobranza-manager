<div>
    <div class="row mb-3">
        <div class="col">
            <h6 class="title">Listado por semanas</h6>
        </div>
        <div class="col-auto align-self-center">

        </div>
    </div>
    <div class="row">
        @foreach ($cajas as $caja)
        <div class="col-12 col-md-6">
            <a href="{{route('cobrador.reporte',$caja->id)}}">
                <div class="card shadow-sm mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <div class="avatar avatar-40 alert-warning text-dark rounded-circle">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                            <div class="col align-self-center ps-0">
                                <p class="mb-0"><span class="badge bg-{{$caja->estado->colorEstado()}}">{{$caja->estado->nombre_estado}}</span></p>
                                <p class="text-muted size-12">Del <strong>{{fechaFormateada(2,$caja->fecha_inicial)}}</strong> al <strong>{{fechaFormateada(2,$caja->fecha_final)}}</strong></p>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </a>
           
        </div>
        @endforeach
        {{$cajas->links()}}
    </div>
   
</div>
