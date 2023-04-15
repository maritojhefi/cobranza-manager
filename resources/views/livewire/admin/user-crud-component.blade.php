@push('header')
    <style>
        .displayNone {
            display: none
        }

        .dislayFull {
            display: contents
        }
    </style>
    <style>
        .file-picker {
            background-color: var(--fimobile-theme-color);
            color: var(--fimobile-theme-text);
            cursor: pointer;
            padding: var(--fimobile-padding);
            line-height: 28px;
            font-size: 16px;
            text-transform: uppercase;
            border-radius: 15%;
            width: 100% !important;
            display: grid;
            place-items: center;
            position: relative;
            top: -10%;
            left: 0%;
        }


        .file-picker+[type='file'] {
            display: none;
        }
    </style>
@endpush
<div class="">
    <form wire:submit.prevent="submit">
        <div class="row h-100 mb-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="row">
                    <div class="col-3" style="display: grid; place-items: center;">
                        @if ($image)
                            <img class="img-user"
                                style="width: 50px; height: 50px; border-radius: 50%; position: relative; top: -10%;"
                                src="{{ $image->temporaryUrl() }}">
                        @else
                            <input type="file" class=" d-none btn-default" id="file-picker"
                                wire:model.debounce.750ms="image">
                            @error('image')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                            <label for="file-picker" class="file-picker"><i class="bi bi-card-image"></i></label>
                        @endif
                    </div>
                    <div class="col-9">
                        <div class="form-group form-floating  mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nombre del cliente" wire:model.debounce.750ms="name">
                            @error('name')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                            <label for="name">Nombre</label>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group form-floating  mb-3">
                    <input type="text" class="form-control @error('apellido') is-invalid @enderror"
                        placeholder="Apellido del cliente" wire:model.debounce.750ms="apellido">
                    @error('apellido')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                    <label for="apellido">Apellido</label>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control @error('telf') is-invalid @enderror" placeholder="Celular"
                        wire:model.debounce.750ms="telf">
                    @error('telf')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                    <label for="telf">Telefono</label>
                </div>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control @error('ci') is-invalid @enderror" placeholder="Carnet"
                        wire:model.debounce.750ms="ci">
                    @error('ci')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                    <label for="ci">Carnet</label>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-3">
                <div class="form-group form-floating">
                    <input type="text" class="form-control @error('direccion') is-invalid @enderror"
                        placeholder="Dirección" wire:model.debounce.750ms="direccion">
                    @error('direccion')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                    <label class="form-control-label" for="direccion">Dirección</label>
                </div>
            </div>

            @if ($role_id != 4)
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="form-group form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Contraseña" wire:model.debounce.750ms="password">
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <label class="form-control-label" for="password">Password</label>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="form-group form-floating">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Confirmacion de la contraseña"
                            wire:model.debounce.750ms="password_confirmation">
                        @error('password_confirmation')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <label class="form-control-label" for="password_confirmation"> <i class=""></i> </label>
                    </div>
                </div>
            @endif
            <input type="hidden" id="latitud" name="latitud" wire:model="lat">
            <input type="hidden" id="longitud" name="longitud" wire:model="long">






            <div class="card card-style mb-2 map-full" data-card-height="cover-card" style="height: 450px;">
                <div id="map" style="width:100%;height:96%;"></div>
            </div>
        </div>





        <div id="errorMapa" class="displayNone">
            <div class="card card-style  round-medium " style="height: 380px;">
                <img src="#" class="card-image " style="height: 430px;">
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







        <div class="row h-100 mb-4">
            <div class="col-6 col-md-3 col-lg-2 mb-3">
                <button type="submit" class="btn btn-default btn-block">Guardar</button>
            </div>
            <div class="col-6 col-md-3 col-lg-2 mb-3">
                <a type="submit" href="javascript:history.back();"
                    class="btn bg-red text-white btn-block">Cancelar</a>
            </div>
        </div>
    </form>

    @push('header')
        <style>
            .displayNone {
                display: none
            }

            .dislayFull {
                display: contents
            }
        </style>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC059fhEiwhAxE0iFJ2mDLac1HPtOWLY4Y" async defer></script>
    @endpush


    @push('footer')
        <script>
            document.querySelectorAll("[type='file']")
                .forEach(function(control) {
                    control.addEventListener('change', function(ev) {
                        console.log(this.id);
                        document.querySelector("[for='" + this.id + "']")
                            .innerHTML = ev.target.files[0].name;
                    });
                });
        </script>


        <script>
            window.onload = function() {

                var toastActualizado = document.getElementById('toast-3');
                toastGps = new bootstrap.Toast(toastActualizado);
                var toastErrorGps = document.getElementById('toast-4');
                toastError = new bootstrap.Toast(toastErrorGps);
                navigator.geolocation.getCurrentPosition(function(location) {
                        console.log(location.coords.latitude);
                        console.log(location.coords.longitude);

                        var map;
                        var center = {

                            lat: location.coords.latitude,
                            lng: location.coords.longitude
                        };

                        function initMap() {
                            map = new google.maps.Map(document.getElementById('map'), {
                                center: center,
                                zoom: 17,
                                gestureHandling: 'greedy'
                            });

                            var marker = new google.maps.Marker({
                                position: {
                                    lat: location.coords.latitude,
                                    lng: location.coords.longitude

                                },
                                draggable: true,
                                map: map,
                                title: 'Ubication'

                            });

                            map.addListener('center_changed', function() {
                                var center = map.getCenter();
                                marker.setPosition(center);
                                $('#latitud').val(center.lat());
                                $('#longitud').val(center.lng());
                            });


                            $('#latitud').val(location.coords.latitude);
                            $('#longitud').val(location.coords.longitude);
                            marker.addListener('dragend', function(event) {
                                toastGps.show();
                                $('#latitud').val(this.getPosition().lat());
                                $('#longitud').val(this.getPosition().lng());
                            });
                        }
                        initMap();
                    },
                    errores);

                function errores(err) {
                    if (err.code == err.TIMEOUT)
                        alert("Se ha superado el tiempo de espera");
                    if (err.code == err.PERMISSION_DENIED)
                        toastError.show();
                    $("#errorMapa").removeClass("displayNone")
                    $("#todoBien").addClass("displayNone")
                    if (err.code == err.POSITION_UNAVAILABLE)
                        alert("El dispositivo no pudo recuperar la posición actual");
                }
            };
        </script>
    @endpush
</div>
