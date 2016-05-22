<?php
	/****************
	****NO TOCAR*****
	*****************/
	
	/***** headerAdmin.php *****/
	/*
		Define los elementos de la barra de navegación para el administrador. 
		Incluye el archivo que genera el <html> y <head>.
		Genera el título de la página
	*/
	
	/*
	Arreglo de los elementos de la barra de navegación
	Posicion:
		0 - Nombre de la sección
		1 - Ubicación
		2 - Permite definir qué sección estará activa.
	*/
	$navElements = array("inicio"=>array("Inicio", "../admin/", ""),
						"menu"=>array("Consutar ordenes", "menu", ""),
						"inventario"=>array("Inventario", "inventario", ""),
						"ordenes"=>array("Repartidores", "ordenes", "")
						);
	require_once("htmlhead.php"); //Genera el inicio de documento (<html> <head>).
?>
	<!-- $title es definida en htmlhead.php -->
	<title><?php	echo $title;	?>Administrador</title>