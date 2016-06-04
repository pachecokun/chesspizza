<?php
	$active = "inicio"; //sección activa en la barra de navegación.
	require_once("../layout/navs/cliente.php");
	require_once("../layout/header.php");
?>
    <!-- <head> content aquí -->
    <style>
		[class*="col-"]{
			text-align: center;
		}
		[class*="col-"] img{
			max-width: 90%;
		}
		
		[class*="col-"] p{
			color: #900;
			font-family: 'Open Sans Condensed', 'Roboto', 'Open Sans', sans-serif;
		}
	</style>
<?php
	$title = "";
	require_once("../layout/body.php");
?>
    <!-- Contenido va aquí-->
    <img src="../img/1.jpg" style="max-width: 100%; padding: -10px;" />
    <!--<img src="../img/ordena.png" style="max-width: 100%; padding: -10px;" />-->
    <div class="row">
    	<div class="col-3 col-m-6">
        	<img src="../img/ordena1.png"/>
            <p class="step">Selecciona una especialidad</p>
        </div>
    	<div class="col-3 col-m-6">
        	<img src="../img/ordena1.5.png"/>
            <p>O crea tu propia pizza</p>
        </div>
    	<div class="col-3 col-m-6">
        	<img src="../img/ordena2.png"/>
            <p class="step">Espera y rastrea tu orden</p>
        </div>
    	<div class="col-3 col-m-6">
        	<img src="../img/ordena3.png"/>
            <p>¡Disfruta!</p>
        </div>
    </div>
<?php
	include_once("../layout/footer.php");
?>