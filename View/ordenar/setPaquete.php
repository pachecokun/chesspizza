<?php
	$active = "ordenar";
	require_once("../headerCliente.php");
?>
    <!-- <head> content aquí -->
	<style>
		.container ul{
			list-style-type: none;
		}
		.container ul li{
			font-size: 20px;
		}
	</style>
<?php
	require_once("../body.php");
?>
    <!-- Contenido va aquí-->
    <h1>Armar Paquete</h1>
	<h2>PQT Llenes</h2>
	<form action='myOrderList' method="post">
		<input type='hidden' name='idPaquete' value='2'>
		<h3>Pizza 1</h3>
		<p>Ingredientes (hasta 4 ingredientes)</p>
		<ul>
			<li><input type="checkbox" name="ingrediente" value="1">Jamón</li>
			<li><input type="checkbox" name="ingrediente" value="2">Piña</li>
			<li><input type="checkbox" name="ingrediente" value="3">Extra queso</li>
			<li><input type="checkbox" name="ingrediente" value="4">Pepperoni</li>
			<li><input type="checkbox" name="ingrediente" value="5">Aceitunas</li>
			<li><input type="checkbox" name="ingrediente" value="6">Jalapeño</li>
			<li><input type="checkbox" name="ingrediente" value="7">Salchicha Italiana</li>
			<li><input type="checkbox" name="ingrediente" value="8">Quesillo</li>
			<li><input type="checkbox" name="ingrediente" value="9">Milanesa</li>
			<li><input type="checkbox" name="ingrediente" value="10">Pierna</li>
		</ul>	
		<div class='row'>
			<div class='col-3 col-md-6'>
				<p>Refresco 1</p>
				<select name='refresco1'>
					<option>Seleccionar...</option>
					<option value='1'>Coca cola</option>
					<option value='2'>Manzanita</option>
					<option value='3'>Fanta</option>
					<option value='4'>Sprite</option>
				</select>
			</div>
			<div class='col-3 col-md-6'>
				<p>Refresco 2</p>
				<select name='refresco1'>
					<option>Seleccionar...</option>
					<option value='1'>Coca cola</option>
					<option value='2'>Manzanita</option>
					<option value='3'>Fanta</option>
					<option value='4'>Sprite</option>
				</select>
			</div>
		</div>
		<p>Total <strong class='text-success'>$249</strong></p>
		<div class='row'>
			<div class='col-6'>
				<a href='addPaquete'><button type='button' class='btn-danger'>Cancelar</button></a>
			</div>
			<div class='col-6'>
				<button type='submit' name='addPaquete' class='btn-success'>Agregar!</button>
			</div>
		</div>
	</form>
<?php
	include_once("../footer.php");
?>