<?php
	$active = "ingredientes";
	$activeSub = "addIngrediente";
	$userSession = 3;
	
	require_once("../layout/navs/gerente.php");
	require_once("../layout/header.php");
?>
    <!-- <head> content aquí -->
<?php
	require_once("../layout/body.php");
?>
	<form action="index.php" method="post">
		<div class='row'>
			<div class='col-4 col-m-9'>
				<input type='text' name='nombre' placeholder='Nombre'/>
			</div>
			<div class='col-4 col-m-3'>
				<input type='number' name='precio' placeholder='Precio' />
			</div>
			<div class='col-4 col-m-12'>
				<input type='number' name='cantidad' placeholder='Cantidad en inventario' />
			</div>
		</div>
		<div class='row'>
			<div class='col-6'>
				<button type='submit' name='add' class='btn-success'>Agregar</button>
			</div>
			<div class='col-6'>
				<a href="../ingredientes"><button type='button' class='btn-danger'>Cancelar</button></a>
			</div>
		</div>
	</form>
<?php
	include_once("../layout/footer.php");
?>