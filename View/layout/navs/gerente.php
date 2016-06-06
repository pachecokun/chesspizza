<?php
	$ingredientesSub = array(
		"showIngredientes"=>array("Lista de ingredientes", "../ingredientes", ""),
		"addIngrediente"=>array("Agregar ingrediente", "../ingredientes/addIngrediente", "")
	);
	$inventarioSub = array(
		"showAll"=>array("Todo", "../inventario", ""),
		"showRefrescos"=>array("Refrescos", "../inventario?show=Refrescos", ""),
		"showIngredientes"=>array("Ingredientes", "../inventario?show=Ingredientes", "")
	);
	$empleadosSub = array(
		"showAll"=>array("Todos", "../empleados", ""),
		"showRepartidores"=>array("Repartidores", "../empleados/?show=Repartidores", ""),
		"showChefs"=>array("Chefs", "../empleados/?show=Chefs", ""),
		"showGerentes"=>array("Gerentes", "../empleados/?show=Gerentes", "")
	);
	$navElements = array("inicio"=>array("Inicio", "../gerente", ""),
		"ordenes"=>array("Consultar ordenes", "../ordenes", ""),
		//"ingredientes"=>array("Ingredientes", "../ingredientes", "", $ingredientesSub),
		"inventario"=>array("Inventario", "../inventario", "", $inventarioSub),
		//"carta"=>array("Carta", "../carta", ""),
		"empleados"=>array("Empleados", "../empleados", "", $empleadosSub)
	);
?>	