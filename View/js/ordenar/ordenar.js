var directionsDisplay;
var directionsService;
var distanceService;
var map;
var m1;
var m2;
var l1;
var l2;
var bounds = new google.maps.LatLngBounds();
function initMap() {
    map = new google.maps.Map(document.getElementById('mapa'), {
        zoom: 15,
        center: {lat: 19.504735, lng: -99.146980},
        mapTypeId: google.maps.MapTypeId.HYBRID,
        tilt: 0
    });
    directionsService = new google.maps.DirectionsService();
    directionsDisplay = new google.maps.DirectionsRenderer();
    distanceService = new google.maps.DistanceMatrixService();
    directionsDisplay.setMap(map);
}

function tiempo() {
    var d1 = document.getElementById('d1').value;
    var d2 = document.getElementById('d2').value;
    l1 = null;
    l2 = null;

    var request = {
        origin: d1,
        destination: d2,
        travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function (result, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(result);
            distanceService.getDistanceMatrix({
                origins: [d1],
                destinations: [d2],
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC
            }, function (response, status) {
                if (status == google.maps.DistanceMatrixStatus.OK) {
                    if (response.rows[0].elements[0].status == 'OK') {
                        info("Tiempo de llegada estimado: " + response.rows[0].elements[0].duration.text);
                    }
                    else {
                        info("Error: " + response.rows[0].elements[0].status);
                    }
                }
                else {
                    info("Error: " + status);
                }
            });
        }
        else {
            info("Error: " + status);
        }
    });

}
function info(txt) {
    document.getElementById('info').innerHTML = txt;
}

function home(lat, lon) {
    var marker = new google.maps.Marker({
        position: {lat: lat, lng: lon},
        map: map,
        title: "Tu ubicación"
    });
    map.zoom = 15;
    bounds.extend(new google.maps.LatLng(lat, lon));
    map.fitBounds(bounds);
    map.panToBounds(bounds);
}

function suc(lat, lon, nom) {
    var icon = {
        url: "/img/favicon.png",
        scaledSize: new google.maps.Size(20, 20)
    };
    var marker = new google.maps.Marker({
        position: {lat: lat, lng: lon},
        map: map,
        title: "Sucursal " + nom,
        icon: icon
    });
    bounds.extend(new google.maps.LatLng(lat, lon));
    map.fitBounds(bounds);
    map.panToBounds(bounds);
}