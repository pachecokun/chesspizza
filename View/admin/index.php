<?php
$navElements = array("menu" => array("PEDIR A DOMICILIO", "menu", ""),
	"consorden" => array("CONSULTAR MI ORDEN", "ordenes", ""),
	"sucursales"=>array("SUCURSALES", "sucursales",""),
	"inventario" => array("INICIAR SESIÓN", "inventario", ""),
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