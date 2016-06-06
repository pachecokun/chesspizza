<?php
	$active = "carta";
	require_once("../layout/navs/cliente.php");
	require_once("../layout/header.php");
	require_once("../../Controller/OrdenController.php");
?>
    <!-- <head> content aquí -->
	<style>
		.pizza{
			width: 100%;
		}
		.pizza button{
			margin: 0;
			width: 100%;
		}
		.ingredients{
			width: 100%;
			height: 150px;
			overflow-y: auto;
		}
		.ingredients > ul > li{
			font-size: 24px;
		}
		p{
			font-size: 32px;
		}
		p > small{
			font-size: 18px;
			color: #999;
			display: block;
		}
	</style>
<?php
	require_once("../layout/body.php");
	$especiales = OrdenController::getEspeciales();
?>
    <!-- Contenido va aquí-->
    <h3>Especialidades</h3>
	<div class='row'>
<?php foreach ($especiales as $especial): ?>
		<div class='col-3 col-m-6'>
			<div class='pizza'>
				<p><?= $especial->getNombre() ?></p>
				<div class='ingredients'>
					<ul>
						<?php foreach ($especial->getPizza()->getIngredientes() as $ingrediente): ?>
							<li><?= $ingrediente->getNombre() ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
<?php endforeach; ?>
<?php
	include_once("../layout/footer.php");
?>