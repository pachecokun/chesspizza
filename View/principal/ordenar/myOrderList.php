<?php
	$pos ="../"; //fix para la ubicación relativa en las rutas.
	$active = "ordenar";
	require_once($pos."../headerCliente.php");
?>
    <!-- <head> content aquí -->
	<style>
		.button-group{
			overflow: hidden;
		}
		.button-group button{
			float: left;
			margin: 0;
			border-radius: 0;
			border-left: 1px solid #FFF;
		}
		.button-group button:first-child{
			border: 0;
		}
		
		.button-group button:first-child{
			border-radius: 5px 0 0 5px;
		}
		.button-group button:last-child{
			border-radius: 0 5px 5px 0;
		}
		.btn-default{
			background-color: #096;
			color: #FFF;
		}
		.btn-default:hover{
			background-color: #096;
			opacity: 0.5;
		}
	</style>
<?php
	require_once($pos."../bodyCliente.php");
?>
    <!-- Contenido va aquí-->
    <h1>Ordenar Pizza</h1>
	<p class='text-info'>Agregue elementos a su orden utilzando los botones de abajo</p>
	<div class='button-group'>
		<button type='button' class='btn-default'>Especialidades</button>
		<button type='button' class='btn-default'>Pizza Personalizada</button>
		<button type='button' class='btn-default'>Paquetes</button>
		<button type='button' class='btn-default'>Complementos</button>		
	</div>
<?php
	include_once($pos."../footer.php");
?>