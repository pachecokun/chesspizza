<?php
require_once "../../Controller/OrdenController.php";


$active = "ordenar";
require_once("../layout/navs/cliente.php");
require_once("../layout/header.php");

if (isset($_POST['nom'])) {
	if (OrdenController::getOrdenSesion() != null) {
		$orden = OrdenController::getOrdenSesion();
	} else {
		$orden = new Orden();
	}
	$dir = $_POST['calle'];
	$dir .= ' '.$_POST['ne'];
	$dir .= $_POST['ni'] != '' ? ' int. '.$_POST['ni'] : '';
	$dir .= ', '.$_POST['col'];
	$dir .= ', '.$_POST['mun'];
	$dir .= ', '.$_POST['cp'];

	$orden->setDireccion($dir);
	$orden->setNombreCliente($_POST['nom']);
	$orden->setTelCliente($_POST['tel']);
	$orden->setEmailCliente($_POST['email']);
	$orden->setLat($_POST['lat']);
	$orden->setLon($_POST['lon']);
	$orden->setSucursalId($_POST['suc']);

	OrdenController::setOrdenSesion($orden);

}
else{
	$orden = OrdenController::getOrdenSesion();
	if ($orden == null) {
		header('Location: /');
	}
}
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
	require_once("../layout/body.php");
$total = OrdenController::getPrecioOrden($orden);
$faltantes = OrdenController::getFaltantes($orden);
$ingredientes = $faltantes['ingredientes'];
$refrescos = $faltantes['refrescos'];
//print_r($_POST);
?>
    <!-- Contenido va aquí-->
    <h1>Orden</h1>
	<div class='table'>
		<table>
			<tr>
				<td>Cantidad</td>
				<td>Descripción</td>
				<td>Precio unitario</td>
				<td>Total</td>
				<td>Eliminar</td>
			</tr>
			<?php foreach ($orden->getPizzas() as $i => $pizza): ?>
				<tr>
					<td>x<?= $pizza->cantidad ?></td>
					<td>Pizza personalizada tamaño <?= $pizza->tamano ?>, orilla
						"<?= $pizza->orilla->getNombre() ?>"
					</td>
					<td>$<?= number_format(OrdenController::getPrecioPizza($pizza), 2) ?></td>
					<td>$<?= number_format(OrdenController::getPrecioPizza($pizza, $pizza->cantidad), 2) ?></td>
					<td><a href="/ordenar/eliminar?especial&i=<?= $i ?>">
							<button type='submit' name='addPaquete'>Eliminar</button>
						</a></td>
				</tr>
			<?php endforeach; ?>
			<?php foreach ($orden->getEspeciales() as $i => $pizza): ?>
				<tr>
					<td>x<?= $pizza->cantidad ?></td>
					<td>Especial "<?= $pizza->getNombre() ?>",
						tamaño <?= OrdenController::getSizePizza($pizza->tamano) ?>, orilla
						"<?= $pizza->orilla->getNombre() ?>"
					</td>
					<td>$<?= number_format(OrdenController::getPrecioEspecial($pizza), 2) ?></td>
					<td>$<?= number_format(OrdenController::getPrecioEspecial($pizza, $pizza->cantidad), 2) ?></td>
					<td><a href="/ordenar/eliminar?especial&i=<?= $i ?>">
							<button type='submit' name='addPaquete'>Eliminar</button>
						</a></td>
				</tr>
			<?php endforeach; ?>
			<?php foreach ($orden->getPaquetes() as $i => $paq): ?>
				<tr>
					<td>x<?= $paq->cantidad ?></td>
					<td>Paquete "<?= $paq->getNombre() ?>" con
						pizza <?= OrdenController::getSizePizza($paq->tamano_pizza) ?> y refresco
						"<?= $paq->getRefresco()->getNombre() ?>"
					</td>
					<td>$<?= number_format(OrdenController::getPrecioPaquete($paq), 2) ?></td>
					<td>$<?= number_format(OrdenController::getPrecioPaquete($paq, $paq->cantidad), 2) ?></td>
					<td><a href="/ordenar/eliminar?paquete&i=<?= $i ?>">
							<button type='submit' name='addPaquete'>Eliminar</button>
						</a></td>
				</tr>
			<?php endforeach; ?>
			<?php foreach ($orden->getRefrescos() as $i => $ref): ?>
				<tr>
					<td>x<?= $ref->cantidad ?></td>
					<td>Refresco "<?= $ref->getNombre() ?>"</td>
					<td>$<?= number_format(OrdenController::getPrecioRefresco($ref), 2) ?></td>
					<td>$<?= number_format(OrdenController::getPrecioRefresco($ref, $ref->cantidad), 2) ?></td>
					<td><a href="/ordenar/eliminar?refresco&i=<?= $i ?>">
							<button type='submit' name='addPaquete'>Eliminar</button>
						</a></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<h3 class='total text-info'>Total: <span class='text-success'>$<?=number_format($total,2)?></span></h3>
<div class='text-danger'>
	<?php if (!empty($ingredientes)) { ?>
		<p style="color:red">No se cuenta con los suficientes ingredientes en sucursal: </p>
		<ul>
			<?php foreach ($ingredientes as $ingrediente): ?>
				<li><?= $ingrediente->getNombre() ?></li>
			<?php endforeach; ?>
		</ul>
	<?php } ?>
	<?php if (!empty($refrescos)) { ?>
		<p style="color:red">No se cuenta con los suficientes refrescos en sucursal: </p>
		<ul>
			<?php foreach ($refrescos as $refresco): ?>
				<li><?= $refresco->getNombre() ?></li>
			<?php endforeach; ?>
		</ul>
	<?php } ?>
</div>
	<h2>Agregar a mi orden:</h2>
	<div class='row'>
		<div class='col-3 col-m-6'>
			<a href="choosePizza"><button type='button' class="btn-success">Especialidades</button></a>
		</div>
		<div class='col-3 col-m-6'>
			<a href="makePizza"><button type='button' class="btn-success">Pizza Personalizada</button></a>
		</div>
		<div class='col-3 col-m-6'>
			<a href="addPaquete">
				<button type='button' class="btn-success">Paquetes</button>
			</a>
		</div>
		<div class='col-3 col-m-6'>
			<a href="addRefresco">
				<button type='button' class="btn-success">Refrescos</button>
			</a>
		</div>
	</div>
	<h2>Finalizar pedido:</h2>
	<h3>Confirme sus datos</h3>
	<b>Dirección: </b><br><?= $orden->getDireccion() ?><br><br>
	<input type="hidden" value='<?= $orden->getDireccion() ?>' name='dir' id='dir'>
	<b>Nombre de responsable: </b><br><?= $orden->getNombreCliente() ?><br><br>
	<input type="hidden" value='<?= $orden->getNombreCliente() ?>' name='nom' id='nom'>
	<b>Teléfono: </b><br><?= $orden->getTelCliente() ?><br><br>
	<input type="hidden" value='<?= $orden->getTelCliente() ?>' name='tel' id='tel'>
	<b>Correo electrónico: </b><br><?= $orden->getEmailCliente() ?><br><br><br>
	<input type="hidden" value='<?= $orden->getEmailCliente() ?>' name='email' id='email'>
	<input type="hidden" value='<?= number_format($total, 2) ?>' name='tot' id='tot'>
	<div class='row'>
		<div class='col-6 col-m-6'>
			<a href="/ordenar/?Lat=<?= $orden->getLat() ?>&Lon=<?= $orden->getLon() ?>?datos=1">
				<button name='addPaquete' class='btn-success'>Modificar datos</button>
			</a>
		</div>
		<?php if ($total != 0 && empty($ingredientes) && empty($refrescos)) { ?>
			<div class='col-6 col-m-6'>
				<a href="/ordenar/confirmar">
					<button type='submit' name='addPaquete' class='btn-success'>Confirmar orden</button>
				</a>
			</div>
		<?php } ?>
		</div>
<?php
	include_once("../layout/footer.php");
?>
