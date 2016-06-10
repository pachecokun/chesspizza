<?php
	$userSession = true;
	$title = "Mi cuenta";
	require_once("../layout/header.php");
	require_once "../../Controller/EmpleadoController.php";
	
	if($_SESSION['empleado']['tipoEmpleado'] == 3){
		require_once("../layout/navs/gerente.php");
	}
	else if($_SESSION['empleado']['tipoEmpleado'] == 2){
		require_once("../layout/navs/repartidor.php");
	}
	else if($_SESSION['empleado']['tipoEmpleado'] == 1){
		//require_once("../layout/navs/chef.php");
	}
	else{
		$_SESSION['message'] = array("danger", "Acceso denegado");
		header("location: /");
	}
	
	require_once("../layout/body.php");
	
	$empleado= array("Desconocido", "Chef", "Repartidor", "Gerente");
	
	$emp = EmpleadoController::getInfo();
	echo	"<h3>{$emp->getNombre()} {$emp->getApPaterno()} {$emp->getApMaterno()}</h3>"
		.	"<small>{$emp->getUsername()}</small>"
		.	"<p><span class='text-info'>{$empleado[$emp->getTipoEmpleado()]}</span> "
		.	"en Sucursal <span class='text-info'>{$_SESSION['empleado']['nomSucursal']}</span></p>"
		.	"<p><strong>Teléfono:</strong> {$emp->getTelefono()}</p>";

	include_once("../layout/footer.php");
?>