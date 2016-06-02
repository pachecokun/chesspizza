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
				"inicio" => array("Regresar", "../principal", "")
	);
	require_once("htmlhead.php"); //Genera el inicio de documento (<html> <head>).
?>
	<!-- $title es definida en htmlhead.php -->
  <?php
    /*(isset($_SESSION["message"])){
      echo $_SESSION["message"];
      unset $_SESSION["message"];
    }*/
  ?>
	<title><?php	echo $title;	?>Chess Pizzas</title>