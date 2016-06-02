<?php
	$active = "ordenar";
	require_once("../layout/navs/cliente.php");
	require_once("../layout/header.php");
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
		<div class='col-4 col-m-6'>
			<div class='paquete'>
				<p>PQT Diviertas</p>
				<div class='elements'>
					<ul>
						<li>1 Pizza grande de 2 ingredienes</li>
						<li>2 refrescos chicos</li>
					</ul>
				</div>
				<p class='precio text-success'>$169</p>
				<a href='setPaquete?id=1'><button class='btn-success'>Elegir</button></a>
			</div>
		</div>
		<div class='col-4 col-m-6'>
			<div class='paquete'>
				<p>PQT Llenes</p>
				<div class='elements'>
					<ul>
						<li>1 Pizza Extra grande de 4 ingredientes</li>
						<li>2 refrescos Jumbo</li>
					</ul>
				</div>
				<p class='precio text-success'>$249</p>
				<a href='setPaquete?id=2'><button class='btn-success'>Elegir</button></a>
			</div>
		</div>
		<div class='col-4 col-m-6'>
			<div class='paquete'>
				<p>PQT Chingues</p>
				<div class='elements'>
					<ul>
						<li>1 Pizza chica de 1 ingrediente</li>
						<li>1 refresco chico</li>
					</ul>
				</div>
				<p class='precio text-success'>$25</p>
				<a href='setPaquete?id=3'><button class='btn-success'>Elegir</button></a>
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='col-4 col-m-6'>
			<div class='paquete'>
				<p>PQT Ya no se qué poner</p>
				<div class='elements'>
					<ul>
						<li>2 pizzas medianas de 4 ingredientes</li>
						<li>2 refrescos medianos</li>
					</ul>
				</div>
				<p class='precio text-success'>$129</p>
				<a href='setPaquete?id=4'><button class='btn-success'>Elegir</button></a>
			</div>
		</div>
	</div>
<?php
	include_once("../layout/footer.php");
?>