<?php
require_once "../../Controller/OrdenController.php";


$pos ="../"; //fix para la ubicación relativa en las rutas.
$active = "ordenar";

require_once($pos."headerCliente.php");

if (isset($_POST['nom'])) {
	$dir = $_POST['calle'];
	$dir .= ' '.$_POST['ne'];
	$dir .= $_POST['ni'] != '' ? ' int. '.$_POST['ni'] : '';
	$dir .= ', '.$_POST['col'];
	$dir .= ', '.$_POST['mun'];
	$dir .= ', '.$_POST['cp'];

	$orden = OrdenController::setDatosOrden($_POST['nom'], $_POST['tel'], $dir, $_POST['email'], $_POST['lat'], $_POST['lon'], $_POST['suc']);
}
else{
	$orden = OrdenController::getOrdenSesion();
}
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
	require_once($pos."body.php");
echo '<pre>';
print_r($orden);
echo '</pre>';
//print_r($_POST);
?>
    <!-- Contenido va aquí-->
    <h1>Orden</h1>
	<?php
		if(isset($_GET['added'])){
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
				."</table></table>";
			$total = 919.00;
		}
	?>
	<h3 class='total text-info'>Total: <span class='text-success'>$<?=number_format($total,2)?></span></h3>
	<p>Agregar a mi orden:</p>
	<div class='row'>
		<div class='col-3 col-m-6'>
			<a href="choosePizza"><button type='button' class="btn-success">Especialidades</button></a>
		</div>
		<div class='col-3 col-m-6'>
			<button type='button' class="btn-success">Pizza Personalizada</button>
		</div>
		<div class='col-3 col-m-6'>
			<a href="addPaquete">
				<button type='button' class="btn-success">Paquetes</button>
			</a>
		</div>
		<div class='col-3 col-m-6'>
			<a href="addRefresco">
				<button type='button' class="btn-success">Refrescos</button>
			</a>
		</div>
	</div>
<?php
	include_once($pos."footer.php");
?>