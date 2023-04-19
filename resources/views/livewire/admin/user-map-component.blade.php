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
<div>
    <div class="row">
        <div class="col-12">
            <div id="map"></div>
        </div>
    </div>
</div>
@push('footer')
    <script>
        window.onload = function() {
            var toastActualizado = document.getElementById('toast-3');
            toastGps = new bootstrap.Toast(toastActualizado);
            var toastErrorGps = document.getElementById('toast-4');
            toastError = new bootstrap.Toast(toastErrorGps);
            navigator.geolocation.getCurrentPosition(function(location) {
                var map;
                var center = {
                    lat: location.coords.latitude,
                    lng: location.coords.longitude
                };
                var marker;

                function initMap() {
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: center,
                        zoom: 17,
                        gestureHandling: 'greedy',
                        zoomControl: false,
                        streetViewControl: false,
                    });
                    var marker = new google.maps.Marker({
                        position: center,
                        map,
                        title: 'Tú',
                        icon: ''
                    });
                    var users = {!! $users !!};
                    var markers = [];
                    users.forEach((element) => {
                        var contentString =
                            "<div class=''><div class='text-center'style='display: grid; place-items: center;'>" +
                            "<div class='text-center'>" +
                            "<img class='mb-2' style='background-repeat: no-repeat; background-position: 50%;border-radius: 50%;background-size: 100% auto;height: 74px;width: 74px;' src='https://cdn.cloudflare.steamstatic.com/steam/apps/570/header.jpg?t=1678300512' alt = 'Grapefruit slice atop a pile of other slices' > " +
                            "<div class='text-center mt-3'><h5><strong class='text-primary'>" +
                            element.name +
                            "</strong></h5></div>" +
                            "<div class='text-center'><small class='text-primary col-12'>(" + element
                            .estado.nombre_estado +
                            ")</small></div>" +
                            "<small class='text-primary col-12'>" + element.telf +
                            "</small>" +
                            "<div class='text-center'><small class='text-primary col-12'>" + element
                            .direccion +
                            "</small></div>" +
                            +
                            "<div class='text-center'><small class='text-danger col-12'>" + element
                            .retrasos +
                            "</small></div>" +
                            "</div>" +
                            "<button class='mr-2 ml-2 mt-4 btn btn-primary'>Ir al Perfil</button>" +
                            "</div></div>";
                        var infowindow = new google.maps.InfoWindow({
                            content: contentString,
                            ariaLabel: {
                                lat: parseFloat(element.lat),
                                lng: parseFloat(element.long)
                            },
                        });
                        var marker = new google.maps.Marker({
                            position: {
                                lat: parseFloat(element.lat),
                                lng: parseFloat(element.long)
                            },
                            title: element.name,
                            icon: element.icono
                        });
                        markers.push(marker);
                        marker.addListener("click", () => {
                            infowindow.open({
                                anchor: marker,
                                map,
                            });
                        });

                    });

                    var markerCluster = new MarkerClusterer(map, markers, {
                        imagePath: '{{ asset("assets/images") }}/',
                        maxZoom: 15
                    });
                }
                initMap();
            });
        }
    </script>
@endpush
