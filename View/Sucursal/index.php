<?php
$active = "sucursales";

require_once("../layout/navs/cliente.php");
require_once("../layout/header.php");
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTNw24eYAdlQdFZOQeTZEdDCJmUoClqG4&language=es"
        type="text/javascript"></script>
<script src="/js/Sucursal/sucursal.js" type="text/javascript"></script>
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
<?php
require_once("../layout/body.php");
?>

<div id="mapa"></div>
<div id="sucs">
    <?php
	/** QUITAR UN ../ SI FALLA **/
    include_once '../../Controller/SucursalController.php';

    $sucursales = SucursalController::getAllSucursales();

    foreach ($sucursales as $sucursal):
        ?>
        <h5><?= $sucursal->getNombre() ?></h5>
        <p style="font-size: 0.81em;"><?= $sucursal->getDireccion() ?></p>
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
include_once("../layout/footer.php");
?>
