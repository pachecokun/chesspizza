<?php
$pos = ""; //fix para la ubicación relativa en las rutas.
$active = "sucursales";
require_once($pos . "../headerCliente.php");
include_once '../../Controller/ProductoController.php';
?>
<?php
require_once($pos . "../body.php");
?>
<h1>Sucursales</h1>

<div id="mapa"></div>
<div id="sucs">
    <?php

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
include_once($pos . "../footer.php");
?>
