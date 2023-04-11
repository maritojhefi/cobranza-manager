<div class="main-container container">
    <form action="#" method="POST">
        <div class="row mb-3">
            <div class="col">
                <h6>Create New User</h6>
            </div>
        </div>
        <div class="row h-100 mb-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input type="text" class="form-control" placeholder="Nombre del cliente" id="name">
                    <label for="name">Nombre</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input type="text" class="form-control" placeholder="Apellido del cliente" id="apellido">
                    <label for="apellido">Apellido</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Celular" id="telf">
                    <label for="telefono">Telefono</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating mb-3">
                    <input type="file" class="form-control" id="foto">
                    <label for="foto">Agregar Imagen <i class="bi bi-plus-circle"></i></label>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Carnet" id="ci">
                    <label for="ci">Cedula de Identidad</label>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <div class="form-group form-floating">
                    <input type="text" class="form-control" id="direccion" placeholder="Dirección">
                    <label class="form-control-label" for="direccion">Dirección</label>
                </div>
            </div>
            <input type="hidden" id="latitud" name="latitud">
            <input type="hidden" id="longitud" name="longitud">
        </div>
        <div class="row h-100 ">
            <div class="col-12 mb-4">
                <a href="#" target="_self" class="btn btn-default btn-lg w-100">Update</a>
            </div>
        </div>




    </form>


  <div class="card card-style mb-2 map-full" data-card-height="cover-card" style="height: 573px;">
                <h3 class="m-3 text-center"> Ubique su domicilio detalladamente</h3>
                <div id="map" style="width:100%;height:600px;"></div>
            </div>


<div id="errorMapa" class="displayNone">
            <div class="card card-style  round-medium " style="height: 380px;">
                <img src="{{ asset('errorMapa.png') }}" class="card-image " style="height: 430px;">
                <div class="card-bottom ms-3 mb-2">
                    <h2 class="font-700 color-white">Concede el permiso</h2>
                    <p class="color-white mt-n2 mb-0">Haz click en el icono del candado en la parte de la url de tu
                        navegador, permite el acceso y
                        recarga la pagina!</p>
                </div>
                <div class="card-overlay bg-black opacity-30"></div>
            </div>
            <div class="alert me-3 ms-3 rounded-s bg-red-dark " role="alert">
                <span class="alert-icon"><i class="fa fa-times-circle font-18"></i></span>
                <h4 class="text-uppercase color-white">Active el GPS</h4>
                <strong class="alert-icon-text">Necesitamos permiso de su ubicacion.</strong>

                <button type="button" class="close color-white opacity-60 font-16" data-bs-dismiss="alert"
                    aria-label="Close">×</button>
            </div>
        </div>
        <div id="toast-3" class="toast toast-tiny toast-top bg-blue-dark fade hide" data-bs-delay="1500"
            data-bs-autohide="true"><i class="fa fa-sync fa-spin me-3"></i>Actualizado!</div>
        <div id="toast-4" class="toast toast-tiny toast-top bg-red-dark fade hide" data-bs-delay="4000"
            data-bs-autohide="true"><i class="fa fa-times me-3"></i>Active su GPS</div>

</div>
