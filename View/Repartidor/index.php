<?php
require_once "../../Controller/RutasController.php";
require_once "../../Controller/RepartidorController.php";

$active = "ordenar";
require_once("../layout/navs/cliente.php");
require_once("../layout/header.php");
$suc = SucursalDAO::get(RepartidorDAO::get($_GET['id'])->getEmpleado()->getSucursal());
RutasController::getRutas($suc);
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTNw24eYAdlQdFZOQeTZEdDCJmUoClqG4&language=es"
        type="text/javascript"></script>
<script src="/js/rutas/rutas.js" type="text/javascript"></script>
<script>
    var myPos;
    var ordenes;
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                myPos = {lat: position.coords.latitude, lng: position.coords.longitude};
                loadMap();
            });
        } else {
            alert("Favor de activar geolocalización");
        }
    }
    function loadMap() {
        getLocation();
        var posSuc = {lat: <?=$suc->getLat()?>, lng: <?=$suc->getLon()?>};
        var waypts = [];
        for (var k = 0; k < ordenes.length; k++) {
            var orden = ordenes[k];
            var lat = orden.getAttribute("lat");
            var lon = orden.getAttribute("lon");
            var wpt = {location: lat + " " + lon, stopover: true};
            waypts.push(wpt);
        }
        var request = {
            origin: myPos,
            destination: posSuc,
            waypoints: waypts,
            travelMode: google.maps.TravelMode.DRIVING
        };
        directionsService.route(request, function (result, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(result);
                distanceService.getDistanceMatrix({
                    origins: [myPos],
                    destinations: [posSuc],
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
    function getRuta() {
        var divordenes = document.getElementById("ordenes");
        var req = new XMLHttpRequest();
        req.open("GET", "/Repartidor/xmlruta?id=<?=$_GET['id']?>");
        req.send();
        req.onreadystatechange = function () {
            if (req.readyState == 4 && req.status == 200) {

                doc = req.responseXML;
                ordenes = doc.getElementsByTagName("orden");
                divordenes.innerHTML = "";

                for (var k = 0; k < ordenes.length; k++) {
                    var orden = ordenes[k];
                    var lista = document.createElement("ul");
                    var dorden = document.createElement("div");

                    var titulo1 = document.createElement("h1");
                    titulo1.textContent = "Orden " + orden.getAttribute("id");
                    var titulo2 = document.createElement("h2");
                    titulo2.textContent = "Cliente: " + orden.getAttribute("cliente");
                    var linkentregar = document.createElement("a");
                    linkentregar.href = "/Repartidor/confirmar?id=" + orden.getAttribute("id") + "&rep=" +<?=$_GET['id']?>;
                    var btnentregar = document.createElement("button");
                    btnentregar.textContent = "Confirmar entrega";
                    btnentregar.setAttribute("class", "btn-success");
                    linkentregar.appendChild(btnentregar);
                    dorden.appendChild(titulo1);
                    dorden.appendChild(titulo2);

                    pizzas = orden.getElementsByTagName("pizza");
                    for (var i = 0; i < pizzas.length; i++) {
                        var pizza = pizzas[i];
                        var tamano = pizza.getAttribute("tamano");
                        var cantidad = pizza.getAttribute("cantidad");
                        var strpizza = cantidad + " pizzas " + tamano + ": ";
                        var ingredientes = pizza.getElementsByTagName("ingrediente");
                        for (var j = 0; j < ingredientes.length; j++) {
                            var ingrediente = ingredientes[i];
                            strpizza += ingrediente.getAttribute("nombre") + ", ";
                        }
                        var lpizza = document.createElement("li");
                        lpizza.setAttribute("class", "pizza");
                        lpizza.textContent = strpizza;
                        lista.appendChild(lpizza);
                    }

                    especiales = orden.getElementsByTagName("especial");
                    for (var i = 0; i < especiales.length; i++) {
                        var especial = especiales[i];
                        var tamano = especial.getAttribute("tamano");
                        var cantidad = especial.getAttribute("cantidad");
                        var nombre = especial.getAttribute("nombre");
                        var stresp = cantidad + " pizzas '" + nombre + "' " + tamano + "s";
                        var lesp = document.createElement("li");
                        lesp.setAttribute("class", "especial");
                        lesp.textContent = stresp;
                        lista.appendChild(lesp);
                    }

                    refrescos = orden.getElementsByTagName("refresco");
                    for (var i = 0; i < refrescos.length; i++) {
                        var refresco = refrescos[i];
                        var cantidad = refresco.getAttribute("cantidad");
                        var nombre = refresco.getAttribute("nombre");
                        var strref = cantidad + " refrescos '" + nombre + "'";
                        var lref = document.createElement("li");
                        lref.setAttribute("class", "especial");
                        lref.textContent = strref;
                        lista.appendChild(lref);
                    }
                    dorden.appendChild(lista);
                    dorden.appendChild(linkentregar);
                    divordenes.appendChild(dorden);
                }
                getLocation();
            }
        };
    }
</script>
<style>
    #mapa {
        width: 40%;
        height: 500px;
        display: inline-block;
    }

    #sucs {
        display: inline-block;
        vertical-align: top;
        margin-left: 5%;
        width: 50%;
    }
</style>
<!-- <head> content aquí -->
<style>
    .container ul {
        list-style-type: none;
    }

    .container ul li {
        font-size: 20px;
    }
</style>

<?php
require_once("../layout/body.php");
?>
<div id="mapa"></div>
<div id="ordenes"></div>
<script>
    initMap();
    getRuta();
    var interval = setInterval(function () {
        getRuta();
    }, 30000);
</script>
<?php
include_once("../layout/footer.php");
?>
