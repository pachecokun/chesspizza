<?php
	$active="miOrden";
	require_once("../layout/navs/cliente.php");
	require_once("../layout/header.php");
	require_once("../../Controller/OrdenController.php");
	require_once("../../Controller/EmpleadoController.php");
	
	if(isset($_POST['cancelar'])){
		if(OrdenController::cancelarOrden($_POST['id'])){
			$_SESSION['message']= array("success", "Orden cancelada");
		}
		else{
			$_SESSION['message']= array("danger", "Hubo un error al cancelar la orden");
		}
	}
	
	if(!isset($_GET['order']) || !isset($_GET['email'])){
		header("location: ../miOrden/getOrden");
	}else{
	
		$orden= OrdenController::getOrden($_GET['order'], $_GET['email']);
		if(empty($orden)){
			$_SESSION['message'] = array("danger", "Orden no encontrada, verifica tus datos");
			header("location: ../miOrden/getOrden");
			exit();
		}
	
	}
	if(empty($orden->getRepartidorId())){
		$repartidor = "sin asignar";
	}else{
		$repartidorObj = EmpleadoDAO::get($orden->getRepartidorId());
		$repartidor = $repartidorObj->getNombre(). " ".$repartidorObj->getApPaterno();
	}
	
	$sucursal = SucursalController::get($orden->getSucursalId())->getNombre();
	$status = $orden->getUltimaOperacion()->getStatus();
	$total = OrdenController::getPrecioOrden($orden);
	
	$timestamp= strtotime($orden->getFechaHora());
	$dia = date('d-m-y', $timestamp);
	$hora = date('h:i a', $timestamp);
?>
    <style>
		.total{
			width: 100%;
			text-align: right;
		}
	</style>
<?php
	require_once("../layout/body.php");
	
	//var_dump($orden);
	//var_dump($orden->getUltimaOperacion());
	//var_dump($status);

?>
	<p><strong>Número de orden: </strong><span class='text-info'><?=	$orden->getId();	?></span></p>
	<p>Status:
		<span class='text-info'><?= $status->getDescripcion();	?></span>
	</p>
	<?php
		if($status->getId() == 1){
			$msg = "Esta seguro de que desea cancelar la orden?";
			echo "<form action='../miOrden' method='post'>"
					."<input type='hidden' name='id' value='{$orden->getId()}' />"
					."<button type='submit' name='cancelar' class='btn-sm btn-danger' onClick='return confirm(\"{$msg}\");'>Cancelar orden</button></form>"
				."</form>";
		}
		else if($status->getId()==2){
			echo "<small>NOTA: la orden no puede cancelarse debido a que ya se está preparando.</small>";
		}
	?>
	<p>Ordenada el <span class='text-info'><?=	$dia	?></span> a las <span class='text-info'><?=	$hora	?></span></p>
	<p>A nombre de: <strong><?=	$orden->getNombreCliente();	?></strong></p>
	<p>Sucursal: <span class='text-info'><?=	$sucursal	?></span></p>
	<p>Repartidor: <span class='text-info'><?=	$repartidor;	?></span></p>
	<p>Dirección:<br><?=	$orden->getDireccion();	?></p>
	<h2>Detalle de la orden</h2>
	<div class='table'>
		<table>
			<?php foreach ($orden->getPizzas() as $i => $pizza): ?>
				<tr>
					<td>x<?= $pizza->cantidad ?></td>
					<td>Pizza personalizada tamaño <?= $pizza->tamano ?>, orilla
						"<?= $pizza->orilla->getNombre() ?>"
					</td>
					<td>$<?= number_format(OrdenController::getPrecioPizza($pizza), 2) ?></td>
					<td>$<?= number_format(OrdenController::getPrecioPizza($pizza, $pizza->cantidad), 2) ?></td>
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
				</tr>
			<?php endforeach; ?>
			<?php foreach ($orden->getRefrescos() as $i => $ref): ?>
				<tr>
					<td>x<?= $ref->cantidad ?></td>
					<td>Refresco "<?= $ref->getNombre() ?>"</td>
					<td>$<?= number_format(OrdenController::getPrecioRefresco($ref), 2) ?></td>
					<td>$<?= number_format(OrdenController::getPrecioRefresco($ref, $ref->cantidad), 2) ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<h3 class='total text-info'>Total: <span class='text-success'>$<?=number_format($total,2)?></span></h3>
	<h2>Actividad</h2>
	<div class='table'>
		<table>
			<?php foreach ($orden->getOperaciones() as $op){
				$tmstmp = $op->getFechaHora();
				$dia = date('d-m-y', $timestamp);
				$hora = date('h:i a', $timestamp);
				echo "<tr>"
					."<td>{$op->getStatus()->getDescripcion()}</td>"
					."<td><span class='text-info'>{$dia}</span> a las <span class='text-info'>{$hora}</span></td>"
				."</tr>";
				}
			?>
		</table>
	</div>
	
<?php
	include_once("../layout/footer.php");
?>