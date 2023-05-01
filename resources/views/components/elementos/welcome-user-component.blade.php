<div class="row mb-4">
    <div class="col-auto">
        <div class="avatar avatar-50 shadow rounded-10">
            <img src="{{asset(auth()->user()->foto)}}" alt="">
        </div>
    </div>
    <div class="col align-self-center ps-0">
        <h4 class="text-color-theme"><span class="fw-normal">Hola</span>, {{infoUser('name')?infoUser('name'):'desconocido'}}</h4>
        <p class="text-muted">Bienvenid@!</p>
    </div>
</div>