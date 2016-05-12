<?php
$pos = ""; //fix para la ubicación relativa en las rutas.
$active = "inicio";
$navElements = array(
    "inicio" => array("CONSULTAR ÓRDENES", "menu", ""),
    "sucursales" => array("SUCURSALES", "sucursales", ""),
    "inicio_sesion" => array("CERRAR SESIÓN", "iniciar_sesion", "")
);
require_once("../htmlhead.php");
?>
    <title><?php echo $title; ?>Administrador</title>
    <!-- <head> content aquí -->
<?php
require_once($pos . "../body.php");
?>

    <!-- Contenido va aquí-->
    <img src="../img/1.jpg" style="width: 100%;">
    <img src="../img/ordena.png" style="width: 100%;">
<?php
include_once($pos . "../footer.php");
?>