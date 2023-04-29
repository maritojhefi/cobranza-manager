@extends('cobranza.master')

@push('header')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC059fhEiwhAxE0iFJ2mDLac1HPtOWLY4Y" async defer></script>
    <script src="https://cdn.rawgit.com/googlemaps/js-marker-clusterer/gh-pages/src/markerclusterer.js" async defer>
    </script>
    <style>
        #map {
            width: 100%;
            height: 96%;
            position: absolute !important;
            left: 0px !important;
        }
    </style>
@endpush
@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div id="map"></div>
            </div>
        </div>
    </div>
@endsection
@push('footer')
    <script>
        window.onload = function() {
            navigator.geolocation.getCurrentPosition(function(location) {
                var map;
                var center = {
                    lat: location.coords.latitude,
                    lng: location.coords.longitude
                };
                var marker;

                function initMap() {
                    var nombre = '{!! $user->name !!}';
                    var id = {!! $user->id !!}
                    var foto = '{!! $user->foto !!}'
                    var telf = '{!! $user->telf !!}'
                    var estado = '{!! $user->estado->nombre_estado !!}'
                    var direccion = '{!! $user->direccion !!}'
                    var latitude = {!! $user->lat !!}
                    var longitude = {!! $user->long !!}
                    var icono = '{!! $user->icono !!}'
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: {
                            lat: latitude,
                            lng: longitude
                        },
                        zoom: 17,
                        gestureHandling: 'greedy',
                        zoomControl: false,
                        streetViewControl: false,
                    });
                    new google.maps.Marker({
                        position: {
                            lat: latitude,
                            lng: longitude
                        },
                        map,
                        title: "Hello World!",
                    });
                    var rutaAbono = '{!! route('cobrador.abono') !!}'
                    var contentString =
                        "<div class=''><div class='text-center'style='display: grid; place-items: center;'>" +
                        "<div class='text-center'>" +
                        "<img class='mb-2' style='background-repeat: no-repeat; background-position: 50%;border-radius: 50%;background-size: 100% auto;height: 74px;width: 74px;' src='{{ asset('') }}" +
                        foto + "' alt = 'Grapefruit slice atop a pile of other slices' > " +
                        "<div class='text-center mt-3'><h5><strong class='text-primary'>" +
                        nombre +
                        "</strong></h5></div>" +
                        "<div class='text-center'><small class='text-primary col-12'>(" + estado +
                        ")</small></div>" +
                        "<small class='text-primary col-12'>" + telf +
                        "</small>" +
                        "<div class='text-center'><small class='text-primary col-12'>" + direccion +
                        "</small></div>" +
                        +
                        "</div>" +
                        "<div class='d-flex align-items-center justify-content-center' style='gap: 10px;'><a type='button' href='https://api.whatsapp.com/send?phone=" +
                        telf +
                        "' class='mr-2 ml-2 mt-4 btn btn-success'><i class='bi bi-whatsapp'></i></a> <a type='button' href='" +
                        rutaAbono + "?user_id=" + id +
                        "' class='mr-2 ml-2 mt-4 btn btn-danger'><i class='bi bi-card-checklist'></i></a><a type='button' href='https://www.google.com/maps/dir/?api=1&origin=" +
                        location.coords.latitude + "," + location.coords.longitude +
                        "&destination=" + latitude + "," + longitude +
                        "' class='mr-2 ml-2 mt-4 btn btn-info'><i class='bi bi-map'></i></a></div>" +
                        "</div></div>";
                    var infowindow = new google.maps.InfoWindow({
                        content: contentString,
                        ariaLabel: {
                            lat: parseFloat(latitude),
                            lng: parseFloat(longitude)
                        },
                    });
                }
                initMap();
            });
        }
    </script>
@endpush
