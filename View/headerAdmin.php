<?php
	/****************
	****NO TOCAR*****
	*****************/
	$navElements = array("inicio"=>array("Inicio", "../admin/", ""),
						"menu"=>array("Consutar ordenes", "menu", ""),
						"inventario"=>array("Inventario", "inventario", ""),
						"ordenes"=>array("Repartidores", "ordenes", "")
						);
	require_once("htmlhead.php");
?>
	<title><?php	echo $title;	?>Administrador</title>