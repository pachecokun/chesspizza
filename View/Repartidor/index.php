<?php
require_once "../../Controller/RutasController.php";
require_once "../../Controller/RepartidorController.php";

$active = "ordenar";
require_once("../layout/navs/cliente.php");
require_once("../layout/header.php");
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTNw24eYAdlQdFZOQeTZEdDCJmUoClqG4&language=es"
        type="text/javascript"></script>
<script src="/js/rutas/rutas.js" type="text/javascript"></script>
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
$suc = SucursalDAO::get(6);
echo '<pre>';
//print_r(RepartidorDAO::getDisponiblesSucursal($suc));
RutasController::getRutas($suc);
print_r(RepartidorDAO::getRuta($repartidor));

echo '</pre>';
?>
<div id="mapa"></div>
<script>
    initMap();</script>
<?php
include_once("../layout/footer.php");
?>
