<?php
	$active = "ordenar";
	require_once("../headerCliente.php");
?>
    <!-- <head> content aquí -->
	<style>
	</style>
<?php
	require_once("../body.php");
?>
    <!-- Contenido va aquí-->
    <h1>Preferencias de la pizza</h1>
	<h3>Pizza Hawaiana</h3>
	<form action='../../Controller/OrdenController.php' method="post">
		<input type='hidden' name='id' value='001' />
		<input type='hidden' name='productType' value='especialidad' />
		<p>Tamaño</p>
		<select name='size'>
			<option value='001'>Chica</option>
			<option value='002' selected='selected'>Mediana</option>
			<option value='003'>Grande</option>
		</select>
		<p>Orilla</p>
		<select name='orilla'>
			<option value='001' selected='selected'>Normal</option>
			<option value='002'>Cripsy</option>
			<option value='003'>Rellena de queso</option>
		</select>
		<p>Masa</p>
		<select name='masa'>
			<option value='001' selected='selected'>Normal</option>
			<option value='002'>Delgada</option>
			<option value='003'>Crujiente</option>
		</select>
		<div class='form-group'>
			<input type='number' name='cantidad' placeholder='cantidad' />
		</div>
		<div class='row'>
			<div class='col-6'>
				<button type='button' class='btn-danger'>Cancelar</button>
			</div>
			<div class='col-6'>
				<button type='submit' name='add' class='btn-success'>Agregar!</button>
			</div>
		</div>
	</form>
<?php
	include_once("../footer.php");
?>