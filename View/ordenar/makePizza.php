<?php
	$active = "ordenar";
	$active = "ordenar";
	require_once("../../Controller/OrdenController.php");
	require_once("../layout/navs/cliente.php");
	require_once("../layout/header.php");
	require_once("../../Controller/IngredienteController.php");

$orden = OrdenController::getOrdenSesion();

	$ingredientes = IngredienteController::getAll();
	$orillas = OrillaDAO::getAll();
if (!empty($_POST)) {
	print_r($_POST);
	$ingredientes = array();
	foreach ($_POST['ingredientes'] as $ing => $val) {
		$ingredientes[] = IngredienteDAO::get($ing);
	}
	$pizza = new Pizza();
	$pizza->setIngredientes($ingredientes);
	$pizza = PizzaDAO::save($pizza);
	print_r($pizza);
	$orden->addPizza($pizza, OrillaDAO::get($_POST['orilla']), $_POST['size'], $_POST['cantidad']);
	OrdenController::setOrdenSesion($orden);
	header('Location: /ordenar/myOrderList');
}
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
<form method="post">
		<p>Tamaño</p>
		<select name='size' id="size" onchange="update()">
			<option value='0'>Chica</option>
			<option value='1' selected='selected'>Mediana</option>
			<option value='2'>Grande</option>
		</select>
		<p>Orilla</p>
		<select name='orilla' id="orilla" onchange="update()">
			<?php foreach ($orillas as $orilla): ?>
				<option value='<?= $orilla->getId() ?>'><?= $orilla->getNombre() ?></option>
			<?php endforeach; ?>
		</select>
		<p>Ingredientes</p>
		<ul>
		<?php foreach ($ingredientes as $ingrediente): ?>
			<li><input type="checkbox"
					   name="ingredientes[<?= $ingrediente->getId() ?>]"><?= $ingrediente->getNombre() ?></li>
		<?php endforeach; ?>
		</ul>
		<p>No. de pizzas</p>
		<div class='form-group'>
			<input type='number' name='cantidad' id="cantidad" placeholder='cantidad' value="1" min="1"
					 onchange="update()" onkeyup="update()"/>
		</div>
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
