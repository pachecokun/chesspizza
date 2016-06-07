<?php
	$active = "empleados";
	$activeSub = "showIngredientes";
	$userSession = 3;
	
	require_once("../layout/navs/gerente.php");
	require_once("../layout/header.php");
	
	require_once ("../../Controller/EmpleadoController.php");
	
	if(isset($_POST['add'])){
		$success= EmpleadoController::registrarEmpleadoSuc($_POST['id'], $_SESSION['empleado']['sucursal'], $_POST['usuario'], $_POST['password'], $_POST['nombre'], $_POST['paterno'], $_POST['materno'], $_POST['telefono'], $_POST['tipo']);

		$tipo="";
		switch ($_POST['tipo']) {
			case 1:
				$tipo = "Repartidor";
				break;
			case 2:
				$tipo = "Chef";
				break;
			case 3:
				$tipo = "Gerente";
				break;
			default:
				break;
		}
		if($success){
			$_SESSION['message']= array("success", "$tipo Agregado");
			header("location:../Inventario");
			exit();
		}
		else{
			$_SESSION['message'] = array("danger", "Hubo un problema al agregar al $tipo");
		}
	}
?>
    <!-- <head> content aquí -->
<?php
	$title= "Agregar Empleado";
	require_once("../layout/body.php");
?>
	<form action="addEmpleado" method="post">
		<div class='row'>
			<div class='col-12 col-m-12'>
				Número de Empleado:
				<input type="number" name='id' />
			</div>
			<div class='col-12 col-m-12'>
				Nombre:
				<input type="text" name='nombre' />
			</div>
			<div class='col-12 col-m-12'>
				Apellido Paterno:
				<input type="text" name='paterno' />
			</div>
			<div class='col-12 col-m-12'>
				Apellido Materno:
				<input type="text" name='materno' />
			</div>
			<div class='col-12 col-m-12'>
				Teléfono:
				<input type="number" name='telefono' />
			</div>
			<div class='col-12 col-m-12'>
				Usuario:
				<input type="text" name='usuario' />
			</div>
			<div class='col-12 col-m-12'>
				Contraseña:
				<input type="password" name='password' />
			</div>
			<div class='col-12 col-m-12'>
				Tipo de Empleado:
				<select name="tipo">
					<option value="1">Repartidor</option>
					<option value="2">Chef</option>
					<option value="3">Gerente</option>
				</select>
			</div>
		</div>
		<div class='row'>
			<div class='col-6'>
				<button type='submit' name='add' class='btn-success'>Agregar</button>
			</div>
			<div class='col-6'>
				<a href="../empleados"><button type='button' class='btn-danger'>Cancelar</button></a>
			</div>
		</div>
	</form>
<?php
	include_once("../layout/footer.php");
?>