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



</div>
