<?php
	$active = "ordenar";
	require_once("../layout/navs/cliente.php");
	require_once("../layout/header.php");
?>
    <!-- <head> content aquí -->
	<style>
	</style>
<?php
	require_once("../layout/body.php");
?>
    <!-- Contenido va aquí-->
    <h1>Preferencias de la pizza</h1>
	<h3>Pizza Hawaiana</h3>
	<form action='myOrderList' method="post">
		<input type='hidden' name='id' value='001' />
		<p>Tamaño</p>
		<select name='size'>
			<option value='0'>Chica</option>
			<option value='1' selected='selected'>Mediana</option>
			<option value='2'>Grande</option>
		</select>
		<p>Orilla</p>
		<select name='orilla'>
			<option value='1' selected='selected'>Normal</option>
			<option value='2'>Rellena de queso</option>
		</select>
		<div class='form-group'>
			<input type='number' name='cantidad' placeholder='cantidad' />
		</div>
		<p>Total <strong class='text-success'>$150</strong></p>
		<div class='row'>
			<div class='col-6'>
				<a href='choosePizza'><button type='button' class='btn-danger'>Cancelar</button></a>
			</div>
			<div class='col-6'>
				<button type='submit' name='addEspecialidad' class='btn-success'>Agregar!</button>
			</div>
		</div>
	</form>
<?php
	include_once("../layout/footer.php");
?>