<?php
	$active = "ordenar";
	require_once("../layout/navs/cliente.php");
	require_once("../layout/header.php");
require_once("../../Controller/OrdenController.php");

$paquetes = PaqueteDAO::getAll();
?>
    <!-- <head> content aquí -->
	<style>
		.paquete{
			width: 100%;
		}
		.paquete button{
			margin: 0;
			width: 100%;
		}
		.elements{
			width: 100%;
			height: 150px;
			overflow-y: auto;
		}
		.elements > ul > li{
			font-size: 22px;
		}
		p{
			font-size: 32px;
		}
		p.precio{
			text-align: center;
			font-size: 28px;
			display: block;
		}
	</style>
<?php
	require_once("../layout/body.php");
?>

    <!-- Contenido va aquí-->
    <h1>Escoge un paquete</h1>
	<div class='row'>
		<?php foreach ($paquetes as $paquete): ?>
		<div class='col-4 col-m-6'>
			<div class='paquete'>
				<p><?= $paquete->getNombre() ?></p>
				<div class='elements'>
					<ul>
						<li>1 pizza <?= $paquete->getEspecial()->getNombre() ?></li>
						<li>1 refresco <?= $paquete->getRefresco()->getNombre() ?></li>
					</ul>
				</div>
				<p class='precio text-success'>$<?= number_format($paquete->getPrecio(), 2) ?></p>
				<a href='setPaquete?id=<?= $paquete->getId() ?>'>
					<button class='btn-success'>Elegir</button>
				</a>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
<?php
	include_once("../layout/footer.php");
?>