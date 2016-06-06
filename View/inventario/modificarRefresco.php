<?php
	$active = "inventario";
	$activeSub = "showRefrescos";
	$userSession = 3;
	
	require_once("../layout/navs/gerente.php");
	require_once("../layout/header.php");
	
	require_once ("../../Controller/RefrescoController.php");
	
	if(isset($_POST['modify'])){
		$success= RefrescoController::updateCantidad($_POST['id'], $_SESSION['empleado']['sucursal'], $_POST['cantidad']);
		if($success){
			$_SESSION['message']= array("success", "Cantidad de refresco en inventario modificada");
			header("location:../Inventario");
			exit();
		}
		else{
			$_SESSION['message'] = array("danger", "Hubo un problema al modificar la cantidad de refrescos");
		}
	}
?>
    <!-- <head> content aquí -->
<?php
	$title= "Modificar cantidades de Refresco";
	require_once("../layout/body.php");
	
	if(isset($_GET['id'])){
		$refresco = RefrescoController::get($_GET['id']);
		$existencias = RefrescoController::getCantidad($_SESSION['empleado']['sucursal'], $_GET['id']);
	}
	else{
		$_SESSION['message'] = array("danger", "Producto no encontrado");
		header("location:../inventario");
		exit();
	}
?>
	<form action="modificarRefresco" method="post">
		<div class='row'>
			<input type='hidden' name='id' value='<?php	echo $refresco->getId();	?>' />
			<div class='col-6 col-m-6'>
				Refresco:
				<p><?php	echo $refresco->getNombre();	?></p>
			</div>
			<div class='col-6 col-m-6'>
				Nueva cantidad:
				<input type='number' name='cantidad' placeholder='Cantidad en inventario' value='<?php	echo $existencias;	?>' />
			</div>
		</div>
		<div class='row'>
			<div class='col-6'>
				<button type='submit' name='modify' class='btn-warning'>Modificar</button>
			</div>
			<div class='col-6'>
				<a href="../inventario"><button type='button' class='btn-danger'>Cancelar</button></a>
			</div>
		</div>
	</form>
<?php
	include_once("../layout/footer.php");
?>