<?php
	$active = "inicio"; //sección activa en la barra de navegación (Consultar layout/navs/example.php).
	
	require_once("../layout/navs/gerente.php");
	
	$userSession = 3; //variable auxiliar para el control de sesiones (Consultar layout/header.php)
	require_once("../layout/header.php");
?>
    <!-- <head> content aquí -->
<?php
	require_once("../layout/body.php");
?>
    <h1>Bienvenido</h1>
	<p>Seleccione una sección utilizando la barra de navegación.</p>
<?php
	include_once("../layout/footer.php");
?>