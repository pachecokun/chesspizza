<?php
$pos = ""; //fix para la ubicación relativa en las rutas.
$active = "sucursales";
require_once($pos . "../headerCliente.php");
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTNw24eYAdlQdFZOQeTZEdDCJmUoClqG4&language=es"
        type="text/javascript"></script>
<script src="/js/Sucursal/sucursal.js" type="text/javascript"></script>
<style>
    #mapa {
        width: 40%;
        height: 500px;
        position: relative !important;
        display: inline-block;
    }

    #sucs {
        display: inline-block;
        vertical-align: top;
        margin-left: 40px;
        width: 40%;
    }
</style>
<?php
require_once($pos . "../body.php");
?>
<h1>Sucursales</h1>

<div id="mapa"></div>
<div id="sucs">
    <?php
    include_once '../../Controller/SucursalController.php';

    $sucursales = SucursalController::getAllSucursales();

    foreach ($sucursales as $sucursal):
        ?>
        <h3><?= $sucursal->getNombre() ?></h3>
        <p style="font-size: 1em;"><?= $sucursal->getDireccion() ?></p>
    <?php endforeach; ?>
</div>
<script>
    initMap();
    <?php

    foreach ($sucursales as $sucursal) {
        echo "suc(" . $sucursal->getLat() . "," . $sucursal->getLon() . ",'" . $sucursal->getNombre() . "','" . $sucursal->getDireccion() . "');";
    }
    ?>
</script>

<?php
include_once($pos . "../footer.php");
?>
