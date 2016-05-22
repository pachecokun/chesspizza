<?php
	$pos ="../"; //fix para la ubicación relativa en las rutas.
	$active = "ordenar";
	require_once($pos."../headerCliente.php");
?>
    <!-- <head> content aquí -->
	<style>
		.row{
			width: 100%;
			overflow: hidden;
		}
		.row > .col-4{
			width: 25%;
			float: left;
		}
		.btn-success{
			background-color: #096;
		}
		.btn-success:hover{
			background-color: #096;
			opacity: 0.5;
		}
		button{
			min-width: 0;
			width: 95%;
			margin: 0 auto;
			padding: 10px 0;
		}
	</style>
<?php
	require_once($pos."../bodyCliente.php");
?>
    <!-- Contenido va aquí-->
    <h1>Escoge tu pizza</h1>
	<div class='row'>
		<div class='col-4'>
			<p>Jaguayana</p>
			<ul>
				<li>Jamón</li>
				<li>Piña</li>
				<li>Extra Queso</li>
			</ul>
			<button class='btn-success'>+ Agregar</button>
		</div>
		<div class='col-4'>
			<p>Mejicana</p>
			<ul>
				<li>Chorizo</li>
				<li>Jalapeño</li>
				<li>Cebolla</li>
			</ul>
			<button class='btn-success'>+ Agregar</button>
		</div>
		<div class='col-4'>
		</div>
	</div>
<?php
	include_once($pos."../footer.php");
?>