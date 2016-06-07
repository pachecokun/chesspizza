<?php
	$active = "empleados";
	$activeSub = "showAll";
	$userSession = 3;
	if(isset($_GET['show'])){
		$activeSub = str_replace("/", "", "show".$_GET['show']);
	}
	require_once("../layout/navs/gerente.php");
	require_once("../layout/header.php");
	
	$title = "Empleados";
	require_once("../layout/body.php");
?>
	
<?php
	/******* REPARTIDORES *******/
	if($activeSub=='showRepartidores'){
		require_once ("../../Controller/EmpleadoController.php");
		
		echo "<h3>Repartidores</h3>"
			."<a href='../empleados/addEmpleado'><button class='btn-md btn-success'>Agregar Repartidor</button></a>";
		$repartidoresSuc = EmpleadoController::getTipoEmpleado($_SESSION['empleado']['sucursal'], 1);
		if(!empty($repartidoresSuc)){
			echo "<div class='table'>"
					."<table>"
						."<tr>"
							."<th>Nombre</th>"
							."<th>Apellido Paterno</th>"
							."<th>Apellido Materno</th>"
							."<th>Teléfono</th>"
							."<th></th>"
						."</tr>";
			foreach($repartidoresSuc as $empleado){
				echo "<tr>"
						."<td>{$empleado['empleado']->getNombre()}</td>"
						."<td>{$empleado['empleado']->getApPaterno()}</td>"
						."<td>{$empleado['empleado']->getApMaterno()}</td>"
						."<td>{$empleado['empleado']->getTelefono()}</td>"
						//."<td><a href='../empleados/modificarEmpleado?id={$empleado['empleado']->getId()}'><button class='btn-sm btn-warning'>Modificar existencias</button></a></td>"
					."</tr>";
			}
			echo "</table>"
				."</div>";
		}
		else{
			echo "<p class='text-danger'>No hay repartidores en la sucursal</p>";
		}
	}
	/******* CHEFS *******/
	if($activeSub=='showChefs'){
		require_once ("../../Controller/EmpleadoController.php");
		
		echo "<h3>Chefs</h3>"
			."<a href='../empleados/addEmpleado'><button class='btn-md btn-success'>Agregar Chef</button></a>";
		$chefsSuc = EmpleadoController::getTipoEmpleado($_SESSION['empleado']['sucursal'], 2);
		if(!empty($chefsSuc)){
			echo "<div class='table'>"
					."<table>"
						."<tr>"
							."<th>Nombre</th>"
							."<th>Apellido Paterno</th>"
							."<th>Apellido Materno</th>"
							."<th>Teléfono</th>"
							."<th></th>"
						."</tr>";
			foreach($chefsSuc as $empleado){
				echo "<tr>"
						."<td>{$empleado['empleado']->getNombre()}</td>"
						."<td>{$empleado['empleado']->getApPaterno()}</td>"
						."<td>{$empleado['empleado']->getApMaterno()}</td>"
						."<td>{$empleado['empleado']->getTelefono()}</td>"
						//."<td><a href='../empleados/modificarEmpleado?id={$empleado['empleado']->getId()}'><button class='btn-sm btn-warning'>Modificar existencias</button></a></td>"
					."</tr>";
			}
			echo "</table>"
				."</div>";
		}
		else{
			echo "<p class='text-danger'>No hay chefs en la sucursal</p>";
		}
	}
	/******* GERENTES *******/
	if($activeSub=='showGerentes'){
		require_once ("../../Controller/EmpleadoController.php");
		
		echo "<h3>Gerentes</h3>"
			."<a href='../empleados/addEmpleado'><button class='btn-md btn-success'>Agregar Gerente</button></a>";
		$gerentesSuc = EmpleadoController::getTipoEmpleado($_SESSION['empleado']['sucursal'], 3);
		if(!empty($gerentesSuc)){
			echo "<div class='table'>"
					."<table>"
						."<tr>"
							."<th>Nombre</th>"
							."<th>Apellido Paterno</th>"
							."<th>Apellido Materno</th>"
							."<th>Teléfono</th>"
							."<th></th>"
						."</tr>";
			foreach($gerentesSuc as $empleado){
				echo "<tr>"
						."<td>{$empleado['empleado']->getNombre()}</td>"
						."<td>{$empleado['empleado']->getApPaterno()}</td>"
						."<td>{$empleado['empleado']->getApMaterno()}</td>"
						."<td>{$empleado['empleado']->getTelefono()}</td>"
						//."<td><a href='../empleados/modificarEmpleado?id={$empleado['empleado']->getId()}'><button class='btn-sm btn-warning'>Modificar existencias</button></a></td>"
					."</tr>";
			}
			echo "</table>"
				."</div>";
		}
		else{
			echo "<p class='text-danger'>No hay gerentes en la sucursal</p>";
		}
	}
	include_once("../layout/footer.php");
?>