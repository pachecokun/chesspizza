<?php
$navElements = array("menu"=>array("MENÚ", "menu", ""),
	"sucursales"=>array("SUCURSALES", "sucursales",""),
	"inventario"=>array("INVENTARIO", "inventario", ""),
	"ordenes"=>array("ÓRDENES", "ordenes", "")
);
$active= "inventario";
require_once("../htmlhead.php");
?>
	<title><?php	echo $title;	?>Administrador</title>
	<!-- <head> content aquí -->
<?php
	require_once($pos."../body.php");
?>
	<!-- Contenido va aquí-->
	<h1>Bienvenido</h1>
	<p>Seleccione una opción en el menú de arriba.</p>
<?php
	include_once($pos."../footer.php");
?>