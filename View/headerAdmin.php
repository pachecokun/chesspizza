<?php
	/*********************************************
	***************** OBSOLETO********************
	*** Utilizar layout/header.php en su lugar ***
	*********************************************/
	
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
	$navElements = array("inicio"=>array("Inicio", "../gerente", ""),
						"ordenes"=>array("Consutar ordenes", "../ordenes", ""),
						"inventario"=>array("Inventario", "../inventario", ""),
						"carta"=>array("Carta", "../carta", ""),
						"repartidores"=>array("Repartidores", "../repartidores", ""),
						"logout"=>array("Cerrar sesion", "../Controller/UsuarioController.php", "")
						);
	require_once("htmlhead.php"); //Genera el inicio de documento (<html> <head>).
?>
	<!-- $title es definida en htmlhead.php -->
	<title><?php	echo $title;	?>Gerencia</title>