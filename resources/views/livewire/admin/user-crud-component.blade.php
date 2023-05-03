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
                @if ($editando == false)
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
                            <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                placeholder="Confirmacion de la contraseña"
                                wire:model.debounce.750ms="password_confirmation">
                            @error('password_confirmation')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <label class="form-control-label" for="password_confirmation">Pasword Confirmation</label>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <div class="row position-relative">
                            <div class="col-12">
                                <div class="form-group form-floating">
                                    <input type="text" class="form-control @error('billetera') is-invalid @enderror"
                                        wire:model.debounce.750ms="billetera" placeholder="billetera" />
                                    @error('billetera')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <label class="form-control-label" for="billetera">Entrada (Bs.)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

            <input type="hidden" id="latitud" name="latitud" wire:model="lat">
            <input type="hidden" id="longitud" name="longitud" wire:model="long">


            @if ($role_id == 4)
                <div class="card card-style mb-2 map-full" data-card-height="cover-card" style="height: 450px;">
                    <div id="map" style="width:100%;height:96%;" wire:ignore></div>
                    <button type="button" id="como-llegar" class="como-llegar btn btn-sm btn-primary"
                        style="position: absolute; right: 6%; bottom: 8%; z-index: 1;"> <i class="bi bi-map"></i> como
                        llegar</button>
                </div>
            @endif

        </div>
        <div class="row h-100 mb-4">
            <div class="col-6 col-md-3 col-lg-2 mb-3">
                <button type="submit" id="submitForm"
                    class="btn btn-default btn-lg w-100 btn-block">Guardar</button>
            </div>
            <div class="col-6 col-md-3 col-lg-2 mb-3">
                <a type="submit" href="javascript:history.back();"
                    class="btn bg-red text-white btn-lg w-100 btn-block">Cancelar</a>
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
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC059fhEiwhAxE0iFJ2mDLac1HPtOWLY4Y"></script>
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
        @if ($editando == true)
            <script>
                var latitude = {{ $lat }};
                var longitud = {{ $long }};
                var map;
                var center = {
                    lat: latitude,
                    lng: longitud
                };
                let marker;

                function initMap() {
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: center,
                        zoom: 17,
                        gestureHandling: 'greedy',
                        zoomControl: false,
                        streetViewControl: false,
                    });
                    var marker = new google.maps.Marker({
                        position: {
                            lat: latitude,
                            lng: longitud
                        },
                        map: map,
                        title: 'Ubication'
                    });
                    document.getElementById('como-llegar').addEventListener('click', function() {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            const directionsUrl =
                                `https://www.google.com/maps/dir/?api=1&origin=${position.coords.latitude},${position.coords.longitude}&destination=${marker.position.lat()},${marker.position.lng()}`;
                            window.open(directionsUrl, "_blank");
                        });
                    });
                }
                initMap();
                google.maps.event.addListener(map, 'click', function() {
                    document.activeElement.blur();
                });
            </script>
        @else
            <script src="http://benalman.com/code/projects/jquery-throttle-debounce/jquery.ba-throttle-debounce.js"></script>

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
                            let marker;

                            function initMap() {
                                map = new google.maps.Map(document.getElementById('map'), {
                                    center: center,
                                    zoom: 17,
                                    gestureHandling: 'greedy',
                                    zoomControl: false,
                                    streetViewControl: false,
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
                                    $('#submitForm').addClass('disabled');
                                    var inputs = document.getElementsByTagName('input');
                                    for (var i = 0; i < inputs.length; i++) {
                                        inputs[i].blur();
                                    }
                                });
                                map.addListener('center_changed', $.debounce(2000, function(e) {
                                    var center = map.getCenter();
                                    $('#submitForm').removeClass('disabled')
                                    Livewire.emit('enviarCoord', center.lat(), center
                                        .lng());

                                }))
                                $('#latitud').val(location.coords.latitude);
                                $('#longitud').val(location.coords.longitude);
                                marker.addListener('dragend', function(event) {
                                    toastGps.show();
                                    $('#latitud').val(this.getPosition().lat());
                                    $('#longitud').val(this.getPosition().lng());
                                });
                                document.getElementById('como-llegar').addEventListener('click', function() {
                                    navigator.geolocation.getCurrentPosition(function(position) {
                                        const directionsUrl =
                                            `https://www.google.com/maps/dir/?api=1&origin=${position.coords.latitude},${position.coords.longitude}&destination=${marker.position.lat()},${marker.position.lng()}`;
                                        window.open(directionsUrl, "_blank");
                                    });
                                });
                            }
                            initMap();
                            google.maps.event.addListener(map, 'click', function() {
                                document.activeElement.blur();
                            });
                        },
                        errores);

                    function errores(err) {
                        if (err.code == err.TIMEOUT)
                            alert("Se ha superado el tiempo de espera");
                        if (err.code == err.PERMISSION_DENIED)
                            alert("Active su gps y conceda los permisos para localizar su ubicacion");
                        if (err.code == err.POSITION_UNAVAILABLE)
                            alert("El dispositivo no pudo recuperar la posición actual");
                    }
                };
            </script>
        @endif
    @endpush
</div>
