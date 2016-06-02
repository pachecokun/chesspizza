<?php
	$active = "ordenar";
	require_once("../layout/navs/cliente.php");
	require_once("../layout/header.php");
?>
    <!-- <head> content aquí -->
<?php
	require_once("../layout/body.php");
?>
    <!-- Contenido va aquí-->
    <h1>Complementos</h1>
	<h2>Refrescos</h2>
	<form action='myOrderList' method="post">
		<p>Sabor</p>
		<select name='refresco'>
			<option>Seleccionar...</option>
			<option value='1'>Coca cola</option>
			<option value='2'>Manzanita</option>
			<option value='3'>Fanta</option>
			<option value='4'>Sprite</option>
		</select>
		<p>Tamaño</p>
		<select name='size'>
			<option>Seleccionar...</option>
			<option value='0'>Chico (600ml)</option>
			<option value='1'>Mediano (1.5L)</option>
			<option value='2'>Grande (3L)</option>
		</select>
		<div class='form-group'>
			<input type='number' name='cantidad' placeholder='cantidad' />
		</div>
		<p>Total <strong class='text-success'>$30</strong></p>
		<div class='row'>
			<div class='col-6'>
				<a href='myOrderList'><button type='button' class='btn-danger'>Cancelar</button></a>
			</div>
			<div class='col-6'>
				<button type='submit' name='addComplement' class='btn-success'>Agregar!</button>
			</div>
		</div>
	</form>
<?php
	include_once("../layout/footer.php");
?>