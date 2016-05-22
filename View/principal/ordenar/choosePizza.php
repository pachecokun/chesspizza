<?php
	$pos ="../"; //fix para la ubicación relativa en las rutas.
	$active = "ordenar";
	require_once($pos."../headerCliente.php");
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
	require_once($pos."../body.php");
?>
    <!-- Contenido va aquí-->
    <h1>Escoge tu pizza</h1>
	<div class='row'>
		<div class='col-3 col-m-6'>
			<div class='pizza'>
				<p>Hawaiana<small>¡Aloha!</small></p>
				<div class='ingredients'>
					<ul>
						<li>Jamón</li>
						<li>Piña</li>
						<li>Extra Queso</li>
					</ul>
				</div>
				<a href='myOrderList.php?added=true'><button class='btn-success'>Elegir</button></a>
			</div>
		</div>
		<div class='col-3 col-m-6'>
			<div class='pizza'>
				<p>Mexicana<small>Sabor patrio</small></p>
				<div class='ingredients'>
					<ul>
						<li>Chorizo</li>
						<li>Jalapeño</li>
						<li>Cebolla</li>
					</ul>
				</div>
				<button class='btn-success'>Elegir</button>
			</div>
		</div>
		<div class='col-3 col-m-6'>
			<div class='pizza'>
				<p>Pepperoni<small>¡Un clásico!</small></p>
				<div class='ingredients'>
					<ul>
						<li>Pepperoni</li>
						<li>Extra queso</li>
					</ul>
				</div>
				<a href='myOrderList.php?added=true'><button class='btn-success'>Elegir</button></a>
			</div>
		</div>
		<div class='col-3 col-m-6'>
			<div class='pizza'>
				<p>Suprema<small>Para lo exigentes</small></p>
				<div class='ingredients'>
					<ul>
						<li>Pepperoni</li>
						<li>Jamón</li>
						<li>Jalapeño</li>
						<li>Extra queso</li>
						<li>Champiñones</li>
						<li>Salchicha Italiana</li>
						<li>Cebolla</li>
					</ul>
				</div>
				<a href='myOrderList.php?added=true'><button class='btn-success'>Elegir</button></a>
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='col-3 col-m-6'>
			<div class='pizza'>
				<p>Trevi<small>Pa'l antojo</small></p>
				<div class='ingredients'>
					<ul>
						<li>Pierna</li>
						<li>Salchica</li>
						<li>Quesillo</li>
						<li>Queso oaxaca</li>
						<li>Jamón</li>
						<li>Milanesa</li>
						<li>Chipotle</li>
						<li>Frijoles</li>
					</ul>
				</div>
				<a href='myOrderList.php?added=true'><button class='btn-success'>Elegir</button></a>
			</div>
		</div>
	</div>
<?php
	include_once($pos."../footer.php");
?>