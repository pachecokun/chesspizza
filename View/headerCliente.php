<?php
	/****************
	****NO TOCAR*****
	*****************/
	
	/***** headerCliente.php *****/
	/*
		Define los elementos de la barra de navegación para el cliente. 
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
	$navElements = array(
				"inicio" => array("Inicio", "../principal", ""),
				"carta" => array("Carta", "carta", ""),
				"ordenar" => array("Ordenar", "/ordenar/getLocation.php", ""),
				"miOrden" => array("Mi Orden", "miOrden", ""),
		"sucursales" => array("Sucursales", "../Sucursal", "")
				//"login" => array("Iniciar sesion", "login", "")
	);
	require_once("htmlhead.php"); //Genera el inicio de documento (<html> <head>).
?>
	<!-- $title es definida en htmlhead.php -->
	<title><?php	echo $title;	?>Chess Pizzas</title>