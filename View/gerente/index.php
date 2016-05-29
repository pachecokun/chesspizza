<?php
	$pos =""; //fix para la ubicación relativa en las rutas.
	$active = "inicio"; //sección activa en la barra de navegación.
	require_once($pos."../headerAdmin.php");
?>
    <!-- <head> content aquí -->
<?php
	require_once($pos."../body.php");
?>
    <h1>Bienvenido</h1>
	<p>Seleccione una sección utilizando la barra de navegación.</p>
<?php
	include_once($pos."../footer.php");
?>