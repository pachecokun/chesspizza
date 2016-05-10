<?php
	$pos = ""; //fix para la ubicación relativa en las rutas.
	$active= "inventario";
	require_once($pos."../headerAdmin.php");
?>
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