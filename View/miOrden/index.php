<?php
	$active="miOrden";
	require_once("../layout/navs/cliente.php");
	require_once("../layout/header.php");
	require_once("../../Controller/OrdenController.php");
	
	if(!isset($_GET['order']) || !isset($_GET['email'])){
		header("location: getOrden");
	}else{
	
		$orden= OrdenController::getOrden($_GET['order'], $_GET['email']);
		if(empty($orden)){
			$_SESSION['message'] = array("danger", "Orden no encontrada, verifica tus datos");
			header("location: getOrden");
			exit();
		}
	
	}
	if(empty($orden->getRepartidorId())){
		$repartidor = "no asignado";
	}else{
		$repartidor = $orden->getRepartidorId();
	}
	
	$sucursal = SucursalController::get($orden->getSucursalId())->getNombre();
?>
    <!-- <head> content aquí -->
<?php
	//var_dump($orden);
	require_once("../layout/body.php");
?>
	<p><strong>Número de orden:</strong> <span class='text-info'><?=	$orden->getId();	?></span></p>
	<p>Status: <span class='text-danger'>Ordenada</span></p>
	<button class='btn-sm btn-danger'>Cancelar orden</button>
	<p class='text-info'><?=	$orden->getFechaHora();	?></p>
	<p>A nombre de: <strong><?=	$orden->getNombreCliente();	?></strong></p>
	<p>Sucursal: <span class='text-info'><?=	$sucursal	?></span></p>
	<p>Repartidor: <span class='text-info'><?=	$repartidor;	?></span></p>
	<p>Dirección:<br><?=	$orden->getDireccion();	?></p>
	<div class='sample'>Mapita aquí</div>
<?php
	include_once("../layout/footer.php");
?>