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
    <h1>Armar Pizza</h1>
	<form action='myOrderList' method="post">
		<div class='row'>
			<div class='col-4 col-md-6'>
				<p>Cantidad</p>
				<input type='number' name='cantidad' placeholder='Ingrese la cantidad' />
			</div>
			<div class='col-4 col-md-6'>
				<p>Tamaño</p>
				<select name='size'>
					<option value='0'>Chica</option>
					<option value='1' selected='selected'>Mediana</option>
					<option value='2'>Grande</option>
				</select>
			</div>
			<div class='col-4 col-md-12'>
				<p>Orilla</p>
				<select name='orilla'>
					<option value='1' selected='selected'>Normal</option>
					<option value='2'>Rellena de queso</option>
				</select>
			</div>
		</div>
		<p>Ingredientes</p>
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
		<p>Total <strong class='text-success'>$150</strong></p>
		<div class='row'>
			<div class='col-6'>
				<a href='myOrderList'><button type='button' class='btn-danger'>Cancelar</button></a>
			</div>
			<div class='col-6'>
				<button type='submit' name='addPersonalizada' class='btn-success'>Agregar!</button>
			</div>
		</div>
	</form>
<?php
	include_once("../footer.php");
?>