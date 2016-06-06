<?php
	$active = "inventario";
	$activeSub = "showAll";
	$userSession = 3;
	if(isset($_GET['show'])){
		$activeSub = str_replace("/", "", "show".$_GET['show']);
	}
	require_once("../layout/navs/gerente.php");
	require_once("../layout/header.php");
	
	$title = "Inventario";
	require_once("../layout/body.php");
?>
	
<?php
	/******* INGREDIENTES *******/
	if($activeSub!='showRefrescos'){
		require_once ("../../Controller/IngredienteController.php");
		
		echo "<h3>Ingredientes</h3>"
			."<a href='../inventario/addIngrediente'><button class='btn-md btn-success'>Agregar ingrediente</button></a>";
		$ingredientesSuc = IngredienteController::getAllBySucursalId($_SESSION['empleado']['sucursal']);
		if(!empty($ingredientesSuc)){
			echo "<div class='table'>"
					."<table>"
						."<tr>"
							."<th>Nombre</th>"
							."<th>Precio</th>"
							."<th>Existencias</th>"
							."<th></th>"
						."</tr>";
			foreach($ingredientesSuc as $ingrediente){
				echo "<tr>"
						."<td>{$ingrediente['ingrediente']->getNombre()}</td>"
						."<td>\${$ingrediente['ingrediente']->getPrecio()}</td>"
						."<td>{$ingrediente['existencias']}</td>"
						."<td><a href='../inventario/modificarIngrediente?id={$ingrediente['ingrediente']->getId()}'><button class='btn-sm btn-warning'>Modificar existencias</button></a></td>"
					."</tr>";
			}
			echo "</table>"
				."</div>";
		}
		else{
			echo "<p class='text-danger'>No hay ingredientes en la sucursal</p>";
		}
	}
	/*******  REFRESCOS *********/
	if($activeSub!='showIngredientes'){
		require_once ("../../Controller/RefrescoController.php");
		
		echo "<h3>Refrescos</h3>"
			."<a href='../inventario/addRefresco'><button class='btn-md btn-success'>Agregar refresco</button></a>";
		$refrescosSuc = RefrescoController::getAllBySucursalId($_SESSION['empleado']['sucursal']);
		if(!empty($refrescosSuc)){
			echo "<div class='table'>"
					."<table>"
						."<tr>"
							."<th>Nombre</th>"
							."<th>Precio</th>"
							."<th>Existencias</th>"
							."<th></th>"
						."</tr>";
			foreach($refrescosSuc as $refresco){
				echo "<tr>"
						."<td>{$refresco['refresco']->getNombre()}</td>"
						."<td>\${$refresco['refresco']->getPrecio()}</td>"
						."<td>{$refresco['cantidad']}</td>"
						."<td><a href='../inventario/modificarRefresco?id={$refresco['refresco']->getId()}'><button class='btn-sm btn-warning'>Modificar existencias</button></a></td>"
					."</tr>";
			}
			echo "</table>"
				."</div>";
		}
		else{
			echo "<p class='text-danger'>No hay refrescos en la sucursal</p>";
		}
	}
	include_once("../layout/footer.php");
?>