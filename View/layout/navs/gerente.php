<?php
	$ingredientesSub = array(
		"show"=>array("Lista de ingredientes", "../ingredientes/index", ""),
		"add"=>array("Agregar ingrediente", "../ingredientes/addIngrediente", "")
	);
	$navElements = array("inicio"=>array("Inicio", "../gerente", ""),
		"ordenes"=>array("Consultar ordenes", "../ordenes", ""),
		"ingredientes"=>array("Ingredientes", "../ingredientes", "", $ingredientesSub),
		"inventario"=>array("Inventario", "../inventario", ""),
		"carta"=>array("Carta", "../carta", ""),
		"empleados"=>array("Empleados", "../empleados", "")
	);
?>	