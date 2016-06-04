<?php
	$active = "ingredientes";
	require_once("../layout/navs/gerente.php");
	require_once("../layout/header.php");
	/*if(!isset($_SESSION['empleado']) || $_SESSION['empleado']['id']!=3){
		header("location:/");
	}*/
?>
    <!-- <head> content aquí -->
<?php
	//$userSession= true;
	require_once("../layout/body.php");
?>
	<h1>Ingredientes</h1>
    <ul>
		<li>Jamón</li>
		<li>Piña</li>
		<li>Extra queso</li>
		<li>Pepperoni</li>
	</ul>
<?php
	include_once("../layout/footer.php");
?>