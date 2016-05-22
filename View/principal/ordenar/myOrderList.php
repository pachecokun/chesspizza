<?php
	$pos ="../"; //fix para la ubicación relativa en las rutas.
	$active = "ordenar";
	require_once($pos."../headerCliente.php");
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
	require_once($pos."../body.php");
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
	<h3 class='total text-info'>Total: <span class='text-success'>$<?php		echo $total;	?>.00</span></h3>
	<p>Agregar a mi orden:</p>
	<div class='row'>
		<div class='col-3 col-m-6'>
			<a href="choosePizza.php"><button type='button' class="btn-success">Especialidades</button></a>
		</div>
		<div class='col-3 col-m-6'>
			<button type='button' class="btn-success">Pizza Personalizada</button>
		</div>
		<div class='col-3 col-m-6'>
			<button type='button' class="btn-success">Paquetes</button>
		</div>
		<div class='col-3 col-m-6'>
			<button type='button' class="btn-success">Complementos</button>
		</div>
	</div>
<?php
	include_once($pos."../footer.php");
?>