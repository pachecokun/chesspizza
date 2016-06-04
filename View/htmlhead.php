<?php
	/*********************************************
	***************** OBSOLETO********************
	*** Utilizar layout/header.php en su lugar ***
	*********************************************/
	
	/***** htmlhead.php *****/
	
/*
Genera el inicio del documento con las etiquetas <DOCTYPE> <html> y <head>.
Genera las etiquetas meta, el ícono del sitio e incluye la hoja de estilo
general del sitio.

Nota: Debe ser incluída solo por medio de los headers.
*/
	
	$title = ""; //Para el título de las secciones.
	
	/*
	$active debe ser igual al nombre de alguno de los índices del arreglo $navElements,
	del archivo header, así el arreglo en esa posición se le agregará el class='active' en el html.
	*/
	if(isset($active)){
		$navElements[$active][2] = "class='active'";
		$title = $navElements[$active][0]." - ";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="../css/master.css"/>
		<link rel="shortcut icon" type="image/png" href="../img/favicon.png"/>