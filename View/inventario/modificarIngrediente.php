<?php
	$active = "inventario";
	$activeSub = "showIngredientes";
	$userSession = 3;
	
	require_once("../layout/navs/gerente.php");
	require_once("../layout/header.php");
	
	require_once ("../../Controller/IngredienteController.php");
	
	if(isset($_POST['modify'])){
		$success= IngredienteController::updateCantidad($_POST['id'], $_SESSION['empleado']['sucursal'], $_POST['cantidad']);
		if($success){
			$_SESSION['message']= array("success", "Cantidad en inventario modificada");
			header("location:../Inventario");
			exit();
		}
		else{
			$_SESSION['message'] = array("danger", "Hubo un problema al modificar la cantidad");
		}
	}
?>
    <!-- <head> content aquí -->
<?php
	$title= "Modificar cantidades de Ingrediente";
	require_once("../layout/body.php");
	
	if(isset($_GET['id'])){
		$ingrediente = IngredienteController::get($_GET['id']);
		$existencias = IngredienteController::getExistencias($_SESSION['empleado']['sucursal'], $_GET['id']);
	}
	else{
		$_SESSION['message'] = array("danger", "Ingrediente no encontrado");
		header("location:../inventario");
		exit();
	}
?>
	<form action="modificarIngrediente" method="post">
		<div class='row'>
			<input type='hidden' name='id' value='<?php	echo $ingrediente->getId();	?>' />
			<div class='col-6 col-m-6'>
				Ingrediente:
				<p><?php	echo $ingrediente->getNombre();	?></p>
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