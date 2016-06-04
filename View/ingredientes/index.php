<?php
	$active = "ingredientes";
	$activeSub = "showIngredientes";
	$userSession = 3;
	
	require_once("../layout/navs/gerente.php");
	require_once("../layout/header.php");
?>
    <!-- <head> content aquí -->
	<style>
		table button{
			min-width: 0;
			margin: 0;
			padding: 5px;
			width: 100%;
		}
	</style>
<?php
	require_once("../layout/body.php");
?>
	<a href="../ingredientes/addIngrediente"><button class='btn-success'>Agregar ingrediente</button></a>
	<div class='table'>
		<table>
			<tr>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Acciones</th>				
			</tr>
			<tr>
				<td>Jamón</td>
				<td>$5</td>
				<td>
					<form action='index.php' method='post'>
						<input type='hidden' name='id' value='1' />
						<button type='submit' name='eliminar' class='btn-danger'>Eliminar</button>					
					</form>
					<a><button name='modificar' class='btn-warning'>Modificar</button></a>
				</td>
			</tr>
			<tr>
				<td>Piña</td>
				<td>$5</td>
				<td>
					<form action='index.php' method='post'>
						<input type='hidden' name='id' value='1' />
						<button type='submit' name='eliminar' class='btn-danger'>Eliminar</button>
					</form>
					<a><button name='modificar' class='btn-warning'>Modificar</button></a>
				</td>
			</tr>
			<tr>
				<td>Extra Queso</td>
				<td>$10</td>
				<td>
					<form action='index.php' method='post'>
						<input type='hidden' name='id' value='1' />
						<button type='submit' name='eliminar' class='btn-danger'>Eliminar</button>
					</form>
					<a><button name='modificar' class='btn-warning'>Modificar</button></a>
				</td>
			</tr>
			<tr>
				<td>Pepperoni</td>
				<td>$7</td>
				<td>
					<form action='index.php' method='post'>
						<input type='hidden' name='id' value='1' />
						<button type='submit' name='eliminar' class='btn-danger'>Eliminar</button>
					</form>
					<a><button name='modificar' class='btn-warning'>Modificar</button></a>
				</td>
			</tr>
		</table>
	</div>
<?php
	include_once("../layout/footer.php");
?>