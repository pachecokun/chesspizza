<?php
	$sessionUser = true;
	
	require_once("../layout/navs/example.php");
	require_once("../layout/header.php");
?>
    <!-- <head> content aquí -->
<?php
	$title = "Título"; //Solo si no se quiere el título del active
	require_once("../layout/body.php");
?>
    <!-- Contenido va aquí-->
<?php
	include_once("../layout/footer.php");
?>