<?php
	require_once "../../Controller/OrdenController.php";

	$active = "ordenar";
	require_once("../layout/navs/cliente.php");
	require_once("../layout/header.php");

	if (isset($_POST['nom'])) {
		OrdenController::setDatosOrden($_POST['nom'], $_POST['tel'], "", $_POST['lat'], $_POST['lon']);
	}
	$orden = OrdenController::getDatosOrden();
	$total = 0.00;
?>
    <!-- <head> content aquí -->
	<style>
		button{
			margin: 0;
			width: 100%;
		}
		.total{
			width: 100%;
			text-align: right;
		}
	</style>
<?php
	require_once("../layout/body.php");
	//print_r($_POST);
?>
    <!-- Contenido va aquí-->
    <h1>Orden</h1>
	<?php
		if(isset($_GET['orden'])){
			echo "<div class='table'><table>"
				."<tr>"
					."<td>x3</td>"
					."<td>Pizza hawaiana</td>"
					."<td>Grande, orilla rellena de queso, masa crujiente.</td>"
					."<td>$150</td>"
					."<td>$450</td>"
				."</tr>"
				."<tr>"
					."<td>x1</td>"
					."<td>Pizza Suprema</td>"
					."<td>Mediana, orilla normal, masa receta secreta.</td>"
					."<td>$199</td>"
					."<td>$199</td>"
				."</tr>"
				."<tr>"
					."<td>x1</td>"
					."<td>Pa Q T Chingues</td>"
					."<td>Pizza de peperoni grande, Manzanita sol de 2 Lt.</td>"
					."<td>$210</td>"
					."<td>$210</td>"
				."</tr>"
				."<tr>"
					."<td>x2</td>"
					."<td>Pepsi</td>"
					."<td>1.5 Lt.</td>"
					."<td>$30</td>"
					."<td>$60</td>"
				."</tr>"
				."</table></div>";
			$total = 919.00;
			echo "<h3 class='total text-info'>Total: <span class='text-success'>$".$total.".00</span></h3>";
			echo "<div class='row'>"
						."<div class='col-6 col-m-6'>"
							."<button type='button' class='btn-danger'>Cancelar</button>"
						."</div><div class='col-6 col-m-6'>"
							."<button type='button' class='btn-success'>Listo!</button>"
						."</div>"
					."</div>";
		}
	?>
	<p>Agregar a mi orden:</p>
	<div class='row'>
		<div class='col-3 col-m-6'>
			<a href="choosePizza"><button type='button' class="btn-success">Especialidades</button></a>
		</div>
		<div class='col-3 col-m-6'>
			<a href="makePizza"><button type='button' class="btn-success">Pizza Personalizada</button></a>
		</div>
		<div class='col-3 col-m-6'>
			<button type='button' class="btn-success">Paquetes</button>
		</div>
		<div class='col-3 col-m-6'>
			<a href="addComplement"><button type='button' class="btn-success">Complementos</button></a>
		</div>
	</div>
<?php
	include_once("../layoutfooter.php");
?>