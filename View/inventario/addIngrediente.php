<?php
	$active = "inventario";
	$activeSub = "showIngredientes";
	$userSession = 3;
	
	require_once("../layout/navs/gerente.php");
	require_once("../layout/header.php");
	
	require_once ("../../Controller/IngredienteController.php");
	
	if(isset($_POST['add'])){
		$success= IngredienteController::registrarIngredienteSuc($_POST['id'], $_SESSION['empleado']['sucursal'], $_POST['cantidad']);
		if($success){
			$_SESSION['message']= array("success", "Cantidad agredada a inventario");
			header("location:../Inventario");
			exit();
		}
		else{
			$_SESSION['message'] = array("danger", "Hubo un problema al agregar el ingrediente");
		}
	}
?>
    <!-- <head> content aquí -->
<?php
	$title= "Agregar Ingrediente";
	require_once("../layout/body.php");
	
	$ingredientes = IngredienteController::getAll();
?>
	<form action="addIngrediente" method="post">
		<div class='row'>
			<div class='col-6 col-m-6'>
				Ingrediente:
				<select name='id'>
					<option>Seleccionar...</option>
					<?php
						if(!empty($ingredientes)){
							foreach($ingredientes as $ing){
								echo "<option value='{$ing->getId()}'>{$ing->getNombre()}</option>";
							}
						}
					?>
				</select>
			</div>
			<div class='col-6 col-m-6'>
				Cantidad:
				<input type='number' name='cantidad' placeholder='Cantidad en inventario' />
			</div>
		</div>
		<div class='row'>
			<div class='col-6'>
				<button type='submit' name='add' class='btn-success'>Agregar</button>
			</div>
			<div class='col-6'>
				<a href="../inventario"><button type='button' class='btn-danger'>Cancelar</button></a>
			</div>
		</div>
	</form>
<?php
	include_once("../layout/footer.php");
?>