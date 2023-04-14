@push('header')
    <script src="https://maps.googleapis.com/maps/api/js?key=key=AIzaSyC059fhEiwhAxE0iFJ2mDLac1HPtOWLY4Y"></script>
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
<div class="main-container container">
    <form wire:submit.prevent="submit">
        <div class="row h-100 mb-4">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="row">
                    <div class="col-3" style="display: grid; place-items: center;">
                        @if ($image)
                            <img class="img-user"
                                style="width: 100%; height: auto; border-radius: 50%; position: relative; top: -10%;"
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
            <input type="hidden" value="-35,6561" name="lat" wire:model="lat">
            <input type="hidden" value="-15,7889" name="long" wire:model="long">






            <div id="map" style="width:100%;height:600px;" wire:ignore></div>



        </div>









        <div class="row h-100 mb-4">
            <div class="col-6 col-md-3 col-lg-2 mb-3">
                <button type="submit" class="btn btn-default btn-block">Guardar</button>
            </div>
            <div class="col-6 col-md-3 col-lg-2 mb-3">
                <a type="submit" href="javascript:history.back();" class="btn bg-red text-white btn-block">Cancelar</a>
            </div>
        </div>
    </form>

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




        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC059fhEiwhAxE0iFJ2mDLac1HPtOWLY4Y&callback=initMap" async
            defer></script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC059fhEiwhAxE0iFJ2mDLac1HPtOWLY4Y&callback=initMap" async
            defer></script>
        <script>
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    initMap(position.coords.latitude, position.coords.longitude)
                },
                function errorCallback(error) {
                    console.log(error)
                }
            );


            var map;

            function initMap(lat, lng) {
                var content = ['elena', 'prestamo pendiente', '75818246', 'B/Juan XXIII'];
                var myLatLng = {
                    lat: -34.397,
                    lng: 150.644
                };
                var map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 17,
                    center: myLatLng,
                    gestureHandling: 'cooperative',
                });

                const contentString =
                    "<div class='m-4'><div class='text-center'style='display: grid; place-items: center;'>" +
                    "<div class='text-center'>" +
                    "<img class='mb-2' style='background-repeat: no-repeat; background-position: 50%;border-radius: 50%;background-size: 100% auto;height: 74px;width: 74px;' src='https://cdn.cloudflare.steamstatic.com/steam/apps/570/header.jpg?t=1678300512' alt = 'Grapefruit slice atop a pile of other slices' > " +
                    "<div class='text-center mt-3'><h5><strong>" + content[0] +
                    "</strong></h5></div>" +
                    "<small>" + content[1] + "</small>" +
                    "</div>" +
                    "<button class='mr-2 ml-2 mt-4 btn btn-primary'>Ir al Perfil</button>" +
                    "</div></div>";
                const infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    ariaLabel: "myLatLng",
                });
                const marker = new google.maps.Marker({
                    position: myLatLng,
                    map,
                    title: "Tú (Ubicación actual)",
                    icon: "https://img.icons8.com/material-two-tone/24/null/copy-link.png"
                });

                marker.addListener("click", () => {
                    infowindow.open({
                        anchor: marker,
                        map,
                    });
                });
            }
            window.initMap = initMap;
        </script>
    @endpush
</div>
