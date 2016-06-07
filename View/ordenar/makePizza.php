<?php
	$active = "ordenar";
	$active = "ordenar";
	require_once("../../Controller/OrdenController.php");
	require_once("../layout/navs/cliente.php");
	require_once("../layout/header.php");
	require_once("../../Controller/IngredienteController.php");

	$ingredientes = IngredienteController::getAll();
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
	<script>
		function getSelectedText(elementId) {
			var elt = document.getElementById(elementId);

			if (elt.selectedIndex == -1)
				return null;

			return elt.options[elt.selectedIndex].text;
		}
		function update() {
			var stam = getSelectedText("size");
			var sorilla = getSelectedText("orilla");
			var tam = stam.substring(stam.indexOf('$') + 1);
			var orilla = sorilla.substring(sorilla.indexOf('$') + 1);
			var cantidad = document.getElementById("cantidad").value;
			var precio = (Number(tam) + Number(orilla)) * cantidad;
			document.getElementById("precio").innerHTML = "$" + precio.toFixed(2);
		}
	</script>
<?php
	require_once("../layout/body.php");
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
		<?php foreach ($ingredientes as $ingrediente): ?>
			<li><input type="checkbox" name="ingrediente" value="<?= $ingrediente->getId() ?>"><?= $ingrediente->getNombre() ?></li>
		<?php endforeach; ?>
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
	<script>update()</script>
<?php
	include_once("../layout/footer.php");
?>
