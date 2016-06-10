<?php
	$active = "empleados";
	$userSession = 3;
	
	require_once("../layout/navs/gerente.php");
	require_once("../layout/header.php");
	
	require_once ("../../Controller/EmpleadoController.php");
	
	if(isset($_POST['add'])){
		$success= EmpleadoController::registrarEmpleadoSuc(
				$_SESSION['empleado']['sucursal'],
				$_POST['user'],
				$_POST['password'],
				$_POST['nombre'],
				$_POST['paterno'],
				$_POST['materno'],
				$_POST['telefono'],
				$_POST['tipo']);

		if($success){
			$_SESSION['message']= array("success", "Empleado registrado exitosamente");
			header("location:../empleados");
			exit();
		}
		else{
			if(!empty(EmpleadoDAO::getAll("username = ?", array($_POST['user']))))
				$_SESSION['message'] = array("warning", "El nombre de usuario ya existe");
			else
				$_SESSION['message'] = array("danger", "Hubo un problema al registrar al empleado");
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
			<div class='col-6'>
				Tipo de empleado
			</div>
			<div class='col-6'>
				<select name="tipo" required="required">
					<option value="">Seleccionar...</option>
					<option value="1">Repartidor</option>
					<option value="2">Chef</option>
					<option value="3">Gerente</option>
				</select>
			</div>
		</div>
	
		<div class='row'>
			<div class='col-4 col-m-12'>
				<input type="text" name='nombre' placeholder= "Nombre(s)" required="required"/>
			</div>
			<div class='col-4 col-m-6'>
				<input type="text" name='paterno' placeholder= "Apellido paterno" required="required"/>
			</div>
			<div class='col-4 col-m-6'>
				<input type="text" name='materno' placeholder="Apellido materno" required="required"/>
			</div>
		</div>
		
		<div class='row'>
			<div class='col-12'>
				<input type="number" name='telefono' placeholder="Teléfono" required="required"/>
			</div>
		</div>
		
		
		<div class='row'>
			<div class='col-6'>
				<input type="text" name='user' placeholder= "Nombre de usuario" required="required"/>
			</div>
			<div class='col-6'>
				<input type="password" name='password' placeholder= "Contraseña" required="required"/>
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
	<!--hola-->
<?php
	include_once("../layout/footer.php");
?>