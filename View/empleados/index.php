<?php
	$active = "empleados";
	$activeSub = "showAll";
	$userSession = 3;
	if(isset($_GET['show'])){
		$activeSub = str_replace("/", "", "show".$_GET['show']);
	}
	require_once("../layout/navs/gerente.php");
	require_once("../layout/header.php");
	require_once ("../../Controller/EmpleadoController.php");
	
	$title = "Empleados <small class='text-info'>Sucursal {$_SESSION['empleado']['nomSucursal']}</small>";
	require_once("../layout/body.php");
?>
	
<?php
	$tipo = array("Desconocido", "Chef", "Repartidor", "Gerente", "Super user maybe");
	$suc = $_SESSION['empleado']['sucursal'];
	echo "<a href='../empleados/addEmpleado'><button class='btn-md btn-success'>Agregar Empleado</button></a>";
	if($activeSub=='showGerentes'){
		$type="Gerentes";
		$empleados = EmpleadoController::getAllSucursalByUserType($suc, 3);
	}
	else if($activeSub=='showRepartidores'){
		$type= "Repartidores";
		$empleados = EmpleadoController::getAllSucursalByUserType($suc, 2);
	}
	else if($activeSub=='showChefs'){
		$type="Chefs";
		$empleados = EmpleadoController::getAllSucursalByUserType($suc, 1);
	}
	else{
		$type = "Todos";
		$empleados = EmpleadoController::getAllBySucursalId($suc);
	}
	echo "<h3>{$type}</h3>";
		if(!empty($empleados)){
			echo "<div class='table'>"
					."<table>"
						."<tr>"
							."<th>Nombre Completo</th>"
							."<th>Puesto</th>"
							."<th>Teléfono</th>"
						."</tr>";
			foreach($empleados as $empleado){
				echo "<tr>"
						."<td>{$empleado->getNombre()} {$empleado->getApPaterno()} {$empleado->getApMaterno()}</td>"
						."<td>{$tipo[$empleado->getTipoEmpleado()]}</td>"
						."<td>{$empleado->getTelefono()}</td>"
					."</tr>";
			}
			echo "</table>"
				."</div>";
		}
		else{
			if($type=="Todos")
				$type = "Empleados";
			echo "<p class='text-danger'>No hay {$type} en la sucursal</p>";
		}

	include_once("../layout/footer.php");
?>