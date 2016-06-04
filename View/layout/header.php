<?php
	session_start();
	/****************
	****NO TOCAR*****
	*****************/
	
	/***** header.php *****/
	
/*
-	Activa la sesión
-	Genera el inicio del documento con las etiquetas <DOCTYPE> <html> y <head>.
-	Genera las etiquetas meta, el ícono del sitio e incluye la hoja de estilo
	general del sitio.
-	Si se están manejando sesiones de usuario (variable $userSession) valida que
	se haya iniciado sesión y que el tipo de empleado esté autorizado para entrar
	en esa sección.


*/
	if(!isset($title))
		$title = ""; //Para el título de las secciones.
	
	/*
		$userSession se utiliza como variable auxiliar en caso de que se manejen sesiones
		en la sección.
		NOTA: 	userSession debe ser igual al tipo de empleado que hará uso de la seccion.
				(Si la sección solo puede ser utilizada por el gerente se declara userSession = 3)
	*/
	if(isset($userSession)){
		if(!isset($_SESSION['empleado']) || $_SESSION['empleado']['tipoEmpleado'] != $userSession){
			$_SESSION['message'] = array("warning", "Inicie sesión para continuar"); //Control de mensajes (Consultar layout/body.php)
			header("location: ../login");
			exit();
		}
	}
	/*
	$active y $activeSub deben ser igual al nombre de alguno de los índices de
	tu arreglo $navElements y tu subArreglo (de existir), respectivamente;
	así el arreglo en esa posición se le agregará el class='active' en el html.
	*/
	if(isset($active)){
		$navElements[$active][2] = "class='active'";
		$title = $navElements[$active][0];
	}
	if(isset($activeSub)){
		$navElements[$active][3][$activeSub][2] = "class='active'";
		$title = $navElements[$active][3][$activeSub][0];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="../css/master.css"/>
		<link rel="shortcut icon" type="image/png" href="../img/favicon.png"/>
	<title><?php	if(!empty($title))	echo $title." - ";	?>Chess Pizzas</title>